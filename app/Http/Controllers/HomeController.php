<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddNewPasswordRequest;
use App\Http\Requests\ForgetPasswordPinVerificationRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UserRequest;
use App\Mail\SendEamil;
use App\Models\ContactUs;
use App\Models\Subscription;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    private $email_headers = "";
    public function __construct()
    {
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: no-reply@zeroedge.org\r\n";
        $this->email_headers = $headers;
    }
    public function dashboard(){
        $data["page_name"] = "Dashboard";
        $data["breadcrumb"] = '<li class="breadcrumb-item active">Dashboard</li>';
        return View::make("pages.dashboard",$data);
    }
    public function login(){
        return View::make("pages.login");
    }
    public function loginRequest(LoginRequest $request){
        $credentials = $request->only('email', 'password');
        $remember = $request->input('remember');
        // Add a condition to check if the user's type is "admin"
        $credentials['type'] = 'admin';
        $credentials['status'] = 'enabled';
        // Attempt to authenticate the user with the given credentials
        if (!auth()->attempt($credentials,$remember)) {
            // If authentication fails, return a failed response with a 401 (Unauthorized) status code
            return Redirect::to("login")->with("error","Incorrent email or password.");
        }
        // If authentication is successful, return a success response with the authenticated user
        return Redirect::to("dashboard")->with("success","Welcome to Savvy.");
    }
    public function profile(){
        $data["page_name"] = "Profile";
        $data["breadcrumb"] = '<li class="breadcrumb-item active">Profile</li>';
        return View::make("pages.profile",$data);
    }
    public function updateUserRequest(UserRequest $request){
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->save();
        auth()->setUser($user);
        return Redirect::back()->with("success","User information has been updated.");
    }
    public function updateUserPasswordRequest(ResetPasswordRequest $request){
        if(Hash::check($request->current_password, auth()->user()->password)){
            // Get the current authenticated user
            $user = Auth::user();
            // Update the user's password
            $user->password = bcrypt($request->new_password);
            $user->save();
            // Re-authenticate the user with the updated credentials
            return Redirect::back()->with("success","User password has been updated.");
        }else{
            return Redirect::back()->with("error","Current password is incorrent, please try again.");
        }
    }
    public function forgetPassword(){
        return View::make("pages.forget-password");
    }
    public function forgetPasswordRequest(ForgetPasswordRequest $request){
        // Generate a random verification PIN and update the user's record with it
        // $pin = strtoupper(str()->random(10));
        $pin = rand(1000, 9999);
        User::where("email", $request->email)->update([
            "forget_password_pin_verification" => $pin,
            "forget_password_pin_verification_time" => date("Y-m-d H:i:s")
        ]);
        try {
            $data["subject"] = "Pin Verification";
            $data["pin"] = $pin;
            $data["view"] = "pages.emails.pin";
            try {
                Mail::to($request->email)->send(new SendEamil($data));
            } catch (\Throwable $th) {
                dd($th->getMessage());
            }
        } catch (\Throwable $th) {}
        // Return a success response with a message indicating that the PIN has been sent to the user's email
        return Redirect::to("verify-pin-to-forget-password")->with([
            "success" => "Pin has been sent to your email, please enter pin to add new password.",
            "email" => $request->email
        ]);
    }
    public function verifyPinToForgetPassword(){
        return View::make("pages.verify-pin-to-forget-password");
    }
    public function verifyPinToForgetPasswordRequest(ForgetPasswordPinVerificationRequest $request){
        $user = User::select("id","forget_password_pin_verification_time")->where("email",$request->email)->where("forget_password_pin_verification",$request->pin)->first();
        $time_expires = "fail";
        // Convert the timestamp to a Carbon instance
        if(isset($user->forget_password_pin_verification_time) && !empty($user->forget_password_pin_verification_time)){
            $time_expires = $this->checkExpiryTime($user->forget_password_pin_verification_time);
        }
        if($time_expires == "pass"){
            User::where("id",$user->id)->update([
                "forget_password_pin_verification" => ""
            ]);
            return Redirect::to("add-new-password-on-forget")->with([
                "success" => "Your forget password request has been successfully approved, now you can add new password.",
                "email" => $request->email
            ]);
        }else{
            return Redirect::to("forget-password")->with("error","Verification pin is invalid or expired, please try again.");
        }
    }
    private function checkExpiryTime($timestamp,$seconds=60){
        $olderDate = new DateTime($timestamp);
        $currentDate = new DateTime();
        $diff = $currentDate->getTimestamp() - $olderDate->getTimestamp();
        // Check if the current time is within 30 seconds of the given timestamp
        if ((int)$diff <= (int)$seconds)
        {
            return "pass";
        }else{
            return "fail";
        }
    }
    public function addnewPassowrdOnForget(){
        return View::make("pages.add-new-password-to-forget");
    }
    public function addnewPassowrdOnForgetRequest(AddNewPasswordRequest $request){
        $new_password = bcrypt($request->new_password);
        $user = User::where("email",$request->email)->count();
        if($user > 0){
            User::where("email",$request->email)->update([
                "password" => $new_password
            ]);
            auth()->attempt(['email' => $request->email, 'password' => $new_password]);
            return Redirect::to("login")->with("success","Your account password has been successfully changed.");
        }else{
            return Redirect::to("add-new-password-on-forget")->with([
                "error" => "Request is invalid, please try again.",
                "email" => $request->email
            ]);
        }
    }
    public function logout(){
        auth()->user()->tokens()->delete();
        return Redirect::to("login");
    }
    public function contactUs(){
        $data["page_name"] = "Contact Messages";
        $data["breadcrumb"] = '<li class="breadcrumb-item active">Contact Messages</li>';
        return View::make("pages.contact-us.messages-listing",$data);
    }
    public function destroyContactMessage(Request $request)
    {
        ContactUs::where("id",$request->id)->delete();
    }
    public function contactMessagesListing(){
        $messages = ContactUs::get();
        $listing = [];
        foreach ($messages as $key => $message) {
            $listing[] = [
                $message->id,
                $message->first_name,
                $message->last_name,
                $message->email,
                $message->phone,
                '<div class="btn-group"><a href="javascript:void(0)" onclick="openMessage('.$message->id.')" class="btn btn-sm btn-secondary">View</a><a onclick="deleteMessage('.$message->id.')" class="btn btn-sm btn-danger">Delete</a></div>'
            ];
        }
        return response()->json([
            "data" => $listing
        ]);
    }
    public function subscribers(){
        $data["page_name"] = "Subscribers";
        $data["breadcrumb"] = '<li class="breadcrumb-item active">Subscribers</li>';
        return View::make("pages.subscriber-listing",$data);
    }
    public function subscribersListing(){
        $subscribers = Subscription::get();
        $listing = [];
        foreach ($subscribers as $key => $subscriber) {
            $listing[] = [
                $subscriber->id,
                $subscriber->email
            ];
        }
        return response()->json([
            "data" => $listing
        ]);
    }
    public function viewContactMessage($id){
        $contact = ContactUs::select("message")->where("id",$id)->first();
        return '<div style="font-size: 18px; font-family: sans-serif;">'.ucfirst($contact->message).'</div>';
    }
}

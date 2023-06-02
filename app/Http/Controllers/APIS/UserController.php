<?php

namespace App\Http\Controllers\APIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddNewPasswordRequest;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\ForgetPasswordPinVerificationRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PinVerificationRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\SignUpRequest;
use App\Mail\SendEamil;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    private $email_headers = "";
    public function __construct()
    {
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: no-reply@zeroedge.org\r\n";
        $this->email_headers = $headers;
    }
    public function successResponse($user)
    {
        try {
            // Generate a random token for the user
            $token = $user->createToken(str()->random(40))->plainTextToken;
            // Return a success response with the user, token, and token type
            return response()->json([
                "response" => "success",
                "user" => $user,
                "token" => $token,
                "token_type" => "Bearer",
                "profile_image_base_path" => url("storage")
            ], 200);
        } catch (\Throwable $th) {
            // If an error occurs, return a failed response with the error message
            return $this->failedResponse($th->getMessage());
        }
    }
    public function failedResponse($message, $errorCode = 500)
    {
        // Return a failed response with the error message and HTTP status code
        return response()->json([
            "response" => "error",
            "message" => $message
        ], $errorCode);
    }
    public function signUp(SignUpRequest $request)
    {
        try {
            // Create a new user with the provided data
            $user = User::create([
                "name" => $request->full_name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "gender" => $request->gender??"",
                "city" => $request->city??"",
                "state" => $request->state??"",
                "country" => $request->country??""
            ]);
            // Return a success response with the created user
            return $this->successResponse($user);
        } catch (\Throwable $th) {
            // If an error occurs, return a failed response with the error message
            return $this->failedResponse($th->getMessage());
        }
    }
    public function generatePinToVerifyAccount(ForgetPasswordRequest $request)
    {
        // Generate a random verification PIN and update the user's record with it
        // $pin = strtoupper(str()->random(10));
        $pin = rand(1000, 9999);
        User::where("email", $request->email)->update([
            "pin_verification" => $pin,
            "pin_verification_time" => date("Y-m-d H:i:s")
        ]);
        $data["subject"] = "Pin Verification";
        $data["pin"] = $pin;
        $data["view"] = "pages.emails.pin";
        try {
            Mail::to($request->email)->send(new SendEamil($data));
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        // Return a success response with a message indicating that the PIN has been sent to the user's email
        return response()->json([
            "response" => "success",
            "message" => "Pin has been sent to your email, please enter pin to verify your identity!"
        ], 200);
    }
    public function verifyAccount(PinVerificationRequest $request){
        try {
            $user = User::select("id","pin_verification_time")->where("id",auth()->user()->id)->where("pin_verification",$request->pin)->first();
            $time_expires = "0";
            // Convert the timestamp to a Carbon instance
            if(isset($user->pin_verification_time) && !empty($user->pin_verification_time)){
                $time_expires = $this->checkExpiryTime($user->pin_verification_time);
            }
            if($time_expires == "1"){
                User::where("id",auth()->user()->id)->update([
                    "pin_verification" => "",
                    "email_verified_at" => date("Y-m-d H:i:s")
                ]);
                return response()->json([
                    "response" => "success",
                    "message" => "Your account has been successfully verified!"
                ], 200);
            }else{
                return $this->failedResponse("Verification pin is invalid or expired, please try again.");
            }
        } catch (\Throwable $th) {
            // If an error occurs, return a failed response with the error message
            return $this->failedResponse($th->getMessage());
        }
    }
    public function login(LoginRequest $request)
    {
        try {
            // Attempt to authenticate the user with the given credentials
            if (!auth()->attempt($request->input())) {
                // If authentication fails, return a failed response with a 401 (Unauthorized) status code
                return $this->failedResponse("Email or Password is invalid, Please try again.");
            }
            // If authentication is successful, return a success response with the authenticated user
            return $this->successResponse(auth()->user());
        } catch (\Throwable $th) {
            // If an error occurs, return a failed response with the error message
            return $this->failedResponse($th->getMessage());
        }
    }
    public function logout()
    {
        try {
            // Delete the user's API token
            auth()->user()->tokens()->delete();
            // Return a success response with a message indicating that the user has been logged out
            return response()->json([
                "response" => "success",
                "message" => "You've successfully logged out!"
            ], 200);
        } catch (\Throwable $th) {
            // If an error occurs during the process, return a failed response with the error message
            return $this->failedResponse($th->getMessage());
        }
    }
    public function resetPassword(ResetPasswordRequest $request){
        try {
            if(Hash::check($request->current_password, auth()->user()->password)){
                // Get the current authenticated user
                $user = Auth::user();
                // Update the user's password
                $user->password = bcrypt($request->new_password);
                $user->save();
                // Re-authenticate the user with the updated credentials
                return response()->json([
                    "response" => "success",
                    "message" => "Your account password has been successfully changed!"
                ], 200);
            }else{
                return $this->failedResponse("Current password is incorrent, please try again.");
            }
        } catch (\Throwable $th) {
            // If an error occurs, return a failed response with the error message
            return $this->failedResponse($th->getMessage());
        }
    }
    public function forgetPasswordRequest(ForgetPasswordRequest $request)
    {
        // Generate a random verification PIN and update the user's record with it
        // $pin = strtoupper(str()->random(10));
        $pin = rand(1000, 9999);
        User::where("email", $request->email)->update([
            "forget_password_pin_verification" => $pin,
            "forget_password_pin_verification_time" => date("Y-m-d H:i:s")
        ]);
        $data["subject"] = "Pin Verification";
        $data["pin"] = $pin;
        $data["view"] = "pages.emails.pin";
        try {
            Mail::to($request->email)->send(new SendEamil($data));
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        // Return a success response with a message indicating that the PIN has been sent to the user's email
        return response()->json([
            "response" => "success",
            "message" => "Pin has been sent to your email, please enter pin to add new password!"
        ], 200);
    }
    public function forgetPasswordVerifyPin(ForgetPasswordPinVerificationRequest $request){
        try {
            $user = User::select("id","forget_password_pin_verification_time")->where("email",$request->email)->where("forget_password_pin_verification",$request->pin)->first();
            $time_expires = "0";
            // Convert the timestamp to a Carbon instance
            if(isset($user->forget_password_pin_verification_time) && !empty($user->forget_password_pin_verification_time)){
                $time_expires = $this->checkExpiryTime($user->forget_password_pin_verification_time);
            }
            if($time_expires == "1"){
                User::where("id",$user->id)->update([
                    "forget_password_pin_verification" => ""
                ]);
                return response()->json([
                    "response" => "success",
                    "message" => "Your forget password request has been successfully approved, now you can add new password!"
                ], 200);
            }else{
                return $this->failedResponse("Verification pin is invalid or expired, please try again.");
            }
        } catch (\Throwable $th) {
            // If an error occurs, return a failed response with the error message
            return $this->failedResponse($th->getMessage());
        }
    }
    public function addNewPassword(AddNewPasswordRequest $request){
        try {
            $new_password = bcrypt($request->new_password);
            $user = User::where("email",$request->email)->count();
            if($user > 0){
                User::where("email",$request->email)->update([
                    "password" => $new_password
                ]);
                auth()->attempt(['email' => $request->email, 'password' => $new_password]);
                return response()->json([
                    "response" => "success",
                    "message" => "Your account password has been successfully changed!"
                ], 200);
            }else{
                return $this->failedResponse("Request is invalid, please try again.");
            }
        } catch (\Throwable $th) {
            // If an error occurs, return a failed response with the error message
            return $this->failedResponse($th->getMessage());
        }
    }
    private function checkExpiryTime($timestamp,$seconds=60){
        $olderDate = new DateTime($timestamp);
        $currentDate = new DateTime();
        $diff = $currentDate->getTimestamp() - $olderDate->getTimestamp();
        // Check if the current time is within 30 seconds of the given timestamp
        if ((int)$diff <= (int)$seconds)
        {
            return "1";
        }else{
            return "0";
        }
    }
    public function updateProfile(EditProfileRequest $request){
        try {
            $user = Auth::user();
            $user->name = $request->full_name;
            if(!empty($request->password)){
                if($request->password != $request->password_confirmation){
                    return $this->failedResponse("The password field confirmation does not match.");
                }
                $user->password = bcrypt($request->password);
            }
            $user->gender = $request->gender??"male";
            $user->city = $request->city??"";
            $user->state = $request->state??"";
            $user->country = $request->country??"";
            $path = storage_path('app/profile_image');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            if ($request->hasFile('profile_image')) {
                if ($user->profile_image && Storage::exists($user->profile_image)) {
                    Storage::delete($user->profile_image);
                }
                $file = $request->file('profile_image');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $image = Image::make($file->getRealPath())->orientate();
                $image->encode($file->getClientOriginalExtension(), 50);
                $image->save(storage_path('app/profile_image/'.$filename));
                $user->profile_image = 'app/profile_image/'.$filename;
            }
            $user->save();
            return response()->json([
                "response" => "success",
                "message" => "Your profile has been successfully updated!",
                "user" => $user,
                "profile_image_base_path" => url("storage")
            ], 200);
        } catch (\Throwable $th) {
            // If an error occurs, return a failed response with the error message
            return $this->failedResponse($th->getMessage());
        }
    }
}

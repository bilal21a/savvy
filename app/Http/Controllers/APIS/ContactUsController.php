<?php

namespace App\Http\Controllers\APIS;

use App\Http\Controllers\Controller;
use App\Mail\SendEamil;
use App\Models\ContactUs;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    private $email_headers = "";
    public function __construct()
    {
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: no-reply@zeroedge.org\r\n";
        $this->email_headers = $headers;
    }
    public function failedResponse($message, $errorCode = 500)
    {
        return response()->json([
            "response" => "error",
            "message" => $message
        ], $errorCode);
    }
    public function saveContactMessage(Request $request){
        try {
            ContactUs::insert([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "phone" => $request->phone,
                "message" => $request->message,
            ]);
            return response()->json([
                "response" => "success",
                "message" => "You message has been received, we'll contact you soon."
            ], 200);
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }
    public function subscribeNow(Request $request){
        $check = Subscription::where("email",$request->email)->count();
        if($check < 1){
            Subscription::insert([
                "email" => $request->email
            ]);
            $data["subject"] = "Email Subscribed";
            $data["view"] = "pages.emails.subscribed";
            try {
                Mail::to($request->email)->send(new SendEamil($data));
            } catch (\Throwable $th) {
                dd($th->getMessage());
            }
        }
        return response()->json([
            "response" => "success",
            "message" => "Your email has been subscribed for newsletter."
        ], 200);
    }
}

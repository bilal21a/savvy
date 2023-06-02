<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function failedResponse($message, $errorCode = 500)
    {
        // Return a failed response with the error message and HTTP status code
        return response()->json([
            "response" => "error",
            "message" => $message
        ], $errorCode);
    }
}

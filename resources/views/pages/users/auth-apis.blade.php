@extends("master")
@section("css")
@endsection
@section("content")
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <b class="text-danger">Note:</b>
                <span>Currently verification pin is showing in the response, after implementation we'll remove that pin from response.</span><br>
                <small class="text-primary">These are all auth apis included reset and forget password via email.</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Register</h6>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 300px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/register' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data-raw '{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"full_name" : "adam rock",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"email" : "adamrock@mailinator.com",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"password" : "1234",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"password_confirmation" : "1234",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"gender" : "male",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"city" : "london",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"country" : "UK"</span><br><span>}'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 200px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"response": "success",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"user": {</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"name": "adam rock",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"email": "adamrock@mailinator.com",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"gender": "male",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"city": "london",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"country": "UK",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"updated_at": "2023-03-29T18:15:20.000000Z",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"created_at": "2023-03-29T18:15:20.000000Z",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"id": 12</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;},</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"token": "9|SLUYWAg9XPHDJDt8W7pS1Q85DxMytkCDTYED46nh",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"token_type": "Bearer"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Generate pin to verify new account</h6>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 300px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/generate-pin-to-verify-account' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data-raw '{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"email" : "adamrock@mailinator.com"</span><br><span>}'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 200px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"response": "success",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"message": "Pin has been sent to your email, please enter pin to verify your identity!",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"pin": "NNIXSR4XCQ"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Verify Account</h6>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 300px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/verify-account' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Authorization: Bearer Bearer 9|SLUYWAg9XPHDJDt8W7pS1Q85DxMytkCDTYED46nh' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data '{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"pin" : "O3LUGZP1HR"</span><br><span>}'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 200px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"response": "success",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"message": "Your account has been successfully verified!"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Login</h6>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 300px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/login' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data-raw '{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"email" : "adamrock@mailinator.com",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"password" : "1234"</span><br><span>}'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 200px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"response": "success",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"user": {</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"id": 12,</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"name": "adam rock",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"email": "adamrock@mailinator.com",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"gender": "male",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"city": "london",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"country": "UK",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"type": "website",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"email_verified_at": "2023-03-29T18:46:37.000000Z",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"pin_verification": "",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"pin_verification_time": "2023-03-29 18:46:24",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"forget_password_pin_verification": null,</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"forget_password_pin_verification_time": null,</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"created_at": "2023-03-29T18:15:20.000000Z",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"updated_at": "2023-03-29T18:46:37.000000Z",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"status": "enabled"</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;},</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"token": "10|4cZ69q0xO1y1Gik0TPEng5WQdrB82cpXqBG8vKtY",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"token_type": "Bearer"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Logged in User Details</h6>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 300px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/user' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Authorization: Bearer Bearer 10|4cZ69q0xO1y1Gik0TPEng5WQdrB82cpXqBG8vKtY' \</span><br><span>--header 'Accept: application/json'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 200px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"id": 12,</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"name": "adam rock",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"email": "adamrock@mailinator.com",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"gender": "male",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"city": "london",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"country": "UK",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"type": "website",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"email_verified_at": "2023-03-29T18:46:37.000000Z",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"pin_verification": "",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"pin_verification_time": "2023-03-29 18:46:24",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"forget_password_pin_verification": null,</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"forget_password_pin_verification_time": null,</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"created_at": "2023-03-29T18:15:20.000000Z",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"updated_at": "2023-03-29T18:46:37.000000Z",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"status": "enabled"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Reset Password</h6>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 300px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/reset-password' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Authorization: Bearer Bearer 10|4cZ69q0xO1y1Gik0TPEng5WQdrB82cpXqBG8vKtY' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data '{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"current_password" : "1234",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"new_password" : "1234",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"new_password_confirmation" : "1234"</span><br><span>}'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 200px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"response": "success",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"message": "Your account password has been successfully changed!"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Logout</h6>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 300px;" tabindex="0"><code class="language-markup"><span>curl --location --request POST '{{url("/")}}/api/logout' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Authorization: Bearer Bearer 10|4cZ69q0xO1y1Gik0TPEng5WQdrB82cpXqBG8vKtY'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 200px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"response": "success",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"message": "You've successfully logged out!"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Forget Password Request</h6>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 300px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/forget-password-request' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data-raw '{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"email" : "adamrock@mailinator.com"</span><br><span>}'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 200px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"response": "success",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"message": "Pin has been sent to your email, please enter pin to add new password!",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"pin": "SGIWF9CJNM"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Forget Password Verify Pin</h6>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 300px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/forget-password-verify-pin' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data-raw '{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"email" : "adamrock@mailinator.com",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"pin" : "YGVXCHZHLQ"</span><br><span>}'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 200px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"response": "success",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"message": "Your forget password request has been successfully approved, now you can add new password!"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Add New Password</h6>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 300px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/add-new-password' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data-raw '{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"email" : "adamrock@mailinator.com",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"new_password" : "1234",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"new_password_confirmation" : "1234"</span><br><span>}'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 200px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"response": "success",</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;"message": "Your account password has been successfully changed!"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Contact Messages</h6>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 300px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/save-contact-message' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data-raw '{</span><br><span>    "first_name" : "adam",</span><br><span>    "last_name" : "bark",</span><br><span>    "email" : "adam@gmail.com",</span><br><span>    "phone" : "+39489348394",</span><br><span>    "message" : "What is Lorem Ipsum."</span><br><span>}'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 200px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>    "response": "success",</span><br><span>    "message": "You message has been received, we'll contact you soon."</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Update Profile</h6>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 300px;" tabindex="0"><code class="language-markup"><small>full_name is required, others are optional.</small><br><small>1. full_name<br>2. password (with password_confirmation)<br>3. gender<br>4. city<br>5. state<br>6. country<br>7. profile_image</small><br><br><span>curl --location '{{url("/")}}/api/update-profile' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Authorization: Bearer Bearer 12|lru8bbC4kX3ZIvQGipAJzH7SIKB8F3k4Y8zWGPls' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Cookie: XSRF-TOKEN=eyJpdiI6InJzMExJU3BUUHMvYTRkVE90aEQ2SHc9PSIsInZhbHVlIjoiQXp5WUpnWURZdDFOQTN6WHlQUXFPT1I3VEcwZHJLS0lVTm1QZnBmaXoybnJCQkZmMzA1cXdFUkJhdWhsMmgvTXRuMEQwRlgrY3Z3Y1JTVVE4VzYraHBWMEpSMmVYS0Qya2MyVXhKaEs5MEp5NGFvYzM4dm1DeEhMcGFNR3J4ODAiLCJtYWMiOiJkYThjY2Q0ZjA4NzZiOTYxYTA0ZWU0MDNiOWZhYzYxOTU2ZjlhOGVhNmNmNjRiNTJmN2M0MWZkM2EzMzA3MjBmIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImgvcTF6MnVBUC85eGo0cS9xTE9Cd2c9PSIsInZhbHVlIjoic1ZSbVZad2tWdzV5VUo5VXB0dXIzeW1ySUh4MWRyaENEMHNaVmtaMG1MaVlPU1cyZDRjVXIrdm9JUDBJeTk1MnpiNFVjdUgzbktKdEw4V3plR0oveTJUVndlbXltN3FzbTdodS9aK094NW5MZEZwNXpERVFVbktZME13bGhOSVciLCJtYWMiOiI3N2I4ZTI5NDc1MzUzZTQyNTlmNWU3MjA0ZjcyY2Y0MzM2YjY2YTQ4MzJjMGVlYzZhOGNlZjhlZTA5MmVkOWVjIiwidGFnIjoiIn0%3D' \</span><br><span>--form 'full_name="adam"' \</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 200px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>    "response": "success",</span><br><span>    "message": "Your profile has been successfully updated!",</span><br><span>    "user": {</span><br><span>        "id": 12,</span><br><span>        "name": "adam",</span><br><span>        "email": "asymrashid@mailinator.com",</span><br><span>        "gender": "male",</span><br><span>        "city": "",</span><br><span>        "state": "",</span><br><span>        "country": "",</span><br><span>        "type": "website",</span><br><span>        "email_verified_at": "2023-03-29T18:46:37.000000Z",</span><br><span>        "pin_verification": "",</span><br><span>        "pin_verification_time": "2023-03-29 18:46:24",</span><br><span>        "forget_password_pin_verification": "",</span><br><span>        "forget_password_pin_verification_time": "2023-03-29 19:10:00",</span><br><span>        "created_at": "2023-03-29T18:15:20.000000Z",</span><br><span>        "updated_at": "2023-04-09T20:32:48.000000Z",</span><br><span>        "status": "enabled"</span><br><span>    }</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
</div>
@endsection
@section("js")
@endsection

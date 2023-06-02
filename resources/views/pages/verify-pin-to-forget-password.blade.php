<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
    <head>
        <meta charset="utf-8" />
        <title>Pin Verification | Savvy - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{asset("/")}}public/assets/images/favicon.ico">
        <script src="{{asset("/")}}public/assets/js/layout.js"></script>
        <link href="{{asset("/")}}public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset("/")}}public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset("/")}}public/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="auth-bg 100-vh">
        <div class="bg-overlay bg-light"></div>
        <div class="account-pages">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="auth-full-page-content d-flex min-vh-100 py-sm-5 py-4">
                            <div class="w-100">
                                <div class="d-flex flex-column h-100 py-0 py-xl-4">
                                    <div class="my-auto overflow-hidden">
                                        <div class="row g-0">
                                            <div class="col-lg-6 offset-lg-3 card">
                                                <div class="p-lg-5 p-4">
                                                    <div class="text-center">
                                                        <h1 class="mb-0">Savvy</h1>
                                                        <p class="text-muted mt-2">Forget your password to continue to Savvy.</p>
                                                        @include("pages.messages")
                                                    </div>
                                                    <div class="mt-4">
                                                        <form action="{{url('verify-pin-to-forget-password-request')}}" class="auth-input" method="post">
                                                            @csrf
                                                            @if (Session::has('email'))
                                                                <input type="hidden" name="email" value="{!!Session::get('email')!!}">
                                                            @endif
                                                            <div class="mb-3">
                                                                <label for="pin" class="form-label">Pin</label>
                                                                <input type="text" class="form-control" name="pin" id="pin" placeholder="Enter pin">
                                                            </div>
                                                            <div class="form-check form-check-primary fs-16 py-2">
                                                                <div class="float-end mb-3">
                                                                    <a href="{{url('login')}}" class="text-muted text-decoration-underline fs-14">Back to Login</a>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2">
                                                                <button class="btn btn-primary w-100" type="submit">Forget Password</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset("/")}}public/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset("/")}}public/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="{{asset("/")}}public/assets/libs/node-waves/waves.min.js"></script>
        <script src="{{asset("/")}}public/assets/libs/feather-icons/feather.min.js"></script>
        <script src="{{asset("/")}}public/assets/js/plugins.js"></script>
        <script src="{{asset("/")}}public/assets/js/pages/password-addon.init.js"></script>
    </body>
</html>

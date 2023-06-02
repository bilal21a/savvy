<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
    <head>
        <meta charset="utf-8" />
        <title>Sign In | Savvy - Admin & Dashboard Template</title>
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
                                                        <p class="text-muted mt-2">Sign in to continue to Savvy.</p>
                                                        @include("pages.messages")
                                                    </div>
                                                    <div class="mt-4">
                                                        <form action="{{url('login-request')}}" class="auth-input" method="post">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="userpassword" class="form-label">Password</label>
                                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                                    <input type="password" class="form-control pe-5 password-input" name="password" placeholder="Enter password" id="password-input">
                                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon">
                                                                        <i class="las la-eye align-middle fs-18"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="form-check form-check-primary fs-16 py-2">
                                                                <input class="form-check-input" type="checkbox" id="remember-check" name="remember">
                                                                <div class="float-end">
                                                                    <a href="{{url('forget-password')}}" class="text-muted text-decoration-underline fs-14">Forgot your password?</a>
                                                                </div>
                                                                <label class="form-check-label fs-14" for="remember-check"> Remember me </label>
                                                            </div>
                                                            <div class="mt-2">
                                                                <button class="btn btn-primary w-100" type="submit">Log In</button>
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

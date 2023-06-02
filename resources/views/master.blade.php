<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
    <head>
        <meta charset="utf-8" />
        <title>{{$page_name??"Dashboard"}} | Savvy - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{asset("/")}}public/assets/images/favicon.ico">
        <link href="{{asset("/")}}public/assets/libs/jsvectormap/css/jsvectormap.min.css?v=1.0.1" rel="stylesheet" type="text/css" />
        <script src="{{asset("/")}}public/assets/js/layout.js"></script>
        <link href="{{asset("/")}}public/assets/css/bootstrap.min.css?v=1.0.1" rel="stylesheet" type="text/css" />
        <link href="{{asset("/")}}public/assets/css/icons.min.css?v=1.0.1" rel="stylesheet" type="text/css" />
        <link href="{{asset("/")}}public/assets/css/app.min.css?v=1.0.1" rel="stylesheet" type="text/css" />
        @yield("css")
    </head>
    <body>
        <div id="layout-wrapper">
            @include("layouts.header")
            @include("layouts.sidebar")
            <div class="vertical-overlay"></div>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">{{$page_name??"N/A"}}</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">
                                                <a href="{{url("/")}}">Dashboard</a>
                                            </li>
                                            {!! $breadcrumb !!}
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                @include("pages.messages")
                            </div>
                        </div>
                        @yield("content")
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Savvy.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block"> Design & Develop by Zeroedge </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{asset("/")}}public/assets/js/jquery.min.js"></script>
        <script src="{{asset("/")}}public/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset("/")}}public/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="{{asset("/")}}public/assets/libs/node-waves/waves.min.js"></script>
        <script src="{{asset("/")}}public/assets/libs/feather-icons/feather.min.js"></script>
        <script src="{{asset("/")}}public/assets/js/plugins.js"></script>
        <script src="{{asset("/")}}public/assets/js/app.js"></script>
    </body>
</html>
@yield("js")

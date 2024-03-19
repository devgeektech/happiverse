<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="hapiverse is a new experience, wherein users and businesses use their mobile devices and geo-location technology to connect in real time based on their interests and preferences.
">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login Page - Hapiverse</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('libraries/images/logo/logo_h.png')}}">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('libraries/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('libraries/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('libraries/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('libraries/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('libraries/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('libraries/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('libraries/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('libraries/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('libraries/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('libraries/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('libraries/css/pages/page-auth.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('libraries/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo--><a class="brand-logo d-flex align-items-center py-2" style="top: 0;" href="javascript:void(0);">
                            <img src="{{asset('libraries/images/logo/logo_h.png')}}" width="100px">
                            <img class="d-none" src="{{asset('libraries/images/logo/happiverse-logo-dark.png')}}" width="100px">
                            <h2 class=" brand-text ml-1 d-none" style="color: #0E0A75; font-size: 30px;">Hapiverse</h2>
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-12 align-items-center p-5 bg-white">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                                @yield('content')
                            </div>
                        </div>
                        <!-- /Left Text-->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('libraries/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('libraries/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('libraries/js/core/app-menu.js')}}"></script>
    <script src="{{asset('libraries/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('libraries/js/scripts/pages/page-auth-login.js')}}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>

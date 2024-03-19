<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from friendkit.cssninja.io/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2022 09:16:37 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Friendkit | Sign Up</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KQHJPZP');
        // for modal 
        $(document).ready(function() {
            e.preventDefault();
            $("#myBtn").click(function() {
                $("#myModal").dailog('show');
            });
        });
    </script>
    <style>
        .bs-example {
            margin: 20px;
        }
    </style>
    <!-- End Google Tag Manager -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('libraries/assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('libraries/assets/css/core.css')}}">


</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQHJPZP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Pageloader -->
    <div class="pageloader"></div>
    <div class="infraloader is-active"></div>
    <div class="signup-wrapper">

        <div class="fake-nav">
            <a href="index.html" class="logo">
                <img src="assets/img/logo/friendkit-bold.svg" width="112" height="28" alt="">
            </a>
        </div>

        <div class="process-bar-wrap">
            <div class="process-bar">
                <div class="progress-wrap">
                    <div class="track"></div>
                    <div class="bar"></div>
                    <div id="step-dot-1" class="dot is-first is-active is-current" data-step="0">
                        <i data-feather="smile"></i>
                    </div>
                    <div id="step-dot-2" class="dot is-second" data-step="25">
                        <i data-feather="user"></i>
                    </div>
                    <div id="step-dot-3" class="dot is-third" data-step="50">
                        <i data-feather="image"></i>
                    </div>
                    <div id="step-dot-4" class="dot is-fourth" data-step="75">
                        <i data-feather="lock"></i>
                    </div>
                    <div id="step-dot-5" class="dot is-fifth" data-step="100">
                        <i data-feather="flag"></i>
                    </div>
                    <div id="step-dot-6" class="dot is-fourth" data-step="75">
                        <i data-feather="lock"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="outer-panel">
            <div class="outer-panel-inner">
                <div class="process-title">
                    <h2 id="step-title-1" class="step-title is-active">Welcome Hapiverse Socialite, enter your personal information.</h2>
                    <h2 id="step-title-2" class="step-title">Tell us more about you.</h2>
                    <h2 id="step-title-3" class="step-title">Select Intrests.</h2>
                    <h2 id="step-title-4" class="step-title">Select sub Intrest.</h2>
                    <h2 id="step-title-5" class="step-title">Image Upload</h2>
                    <h2 id="step-title-6" class="step-title">You're all set. Ready?</h2>
                </div>

                <div id="signup-panel-1" class="process-panel-wrap is-active">
                    <div class="columns mt-5">

                        <div class="column is-8">
                            <div class="account-type">
                                <div class="type-image">
                                    <img class="type-illustration" src="assets/img/illustrations/signup/type-3.svg" alt="">
                                    <img class="type-bg light-image" src="assets/img/illustrations/signup/type-3-bg.svg" alt="">
                                    <img class="type-bg dark-image" src="assets/img/illustrations/signup/type-3-bg-dark.svg" alt="">
                                </div>

                                <h3>Personal Information</h3>
                                <p>Create a personal account to be able to do some awesome things.</p>
                                <a class="button is-fullwidth process-button" data-step="step-dot-2">
                                    Continue
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="signup-panel-2" class="process-panel-wrap is-narrow">
                    <div class="form-panel">
                        <div class="field">
                            <label>Full Name</label>
                            <div class="control">
                                <input type="text" class="input" placeholder="Enter your full name" name="name" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="field">
                            <label>Email</label>
                            <div class="control">
                                <input type="text" class="input" placeholder="Enter your email address" value="{{$email}}" disabled name="email">
                            </div>
                        </div>
                        <div class="field">
                            <label>Phone No</label>
                            <div class="control">
                                <input type="text" class="input" placeholder="Enter your phone no" name="phoneNo" value="{{old('phoneNo')}}">
                            </div>
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <div class="control">
                                <input type="text" class="input" placeholder="Enter your passowrd " name="password">
                            </div>
                        </div>
                        <div class="field">
                            <label>Confirm Password</label>
                            <div class="control">
                                <input type="text" class="input education" placeholder="Enter your confirmpassowrd " name="confirm_password">
                            </div>
                        </div>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="javascript: return false;">Open Modal</button>


                        <div class="buttons">
                            <a class="button process-button" data-step="step-dot-1">Back</a>
                            <a class="button process-button is-next" data-step="step-dot-3">Next</a>
                        </div>
                    </div>

                    <div id="signup-panel-3" class="process-panel-wrap is-narrow">
                        <div class="form-panel">
                            <div class="field">
                                <label>Intrest</label>
                                <div class="control">
                                    <!-- <input type="text" class="input" placeholder="Enter your phone number"> -->

                                    @foreach($intrest as $int)
                                    <img src="{{$int->interestImage}}" height="20px" width="20px">
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="buttons">
                            <a class="button process-button" data-step="step-dot-2">Back</a>
                            <a class="button process-button is-next" data-step="step-dot-4">Next</a>
                        </div>
                    </div>

                    <div id="signup-panel-4" class="process-panel-wrap is-narrow">
                        <div class="form-panel">
                            <div class="field">
                                <label>Password</label>
                                <div class="control">
                                    <input type="password" class="input" placeholder="Choose a password">
                                </div>
                            </div>
                            <div class="field">
                                <label>Repeat Password</label>
                                <div class="control">
                                    <input type="password" class="input" placeholder="Repeat your password">
                                </div>
                            </div>
                            <div class="field">
                                <label>Phone Number</label>
                                <div class="control">
                                    <input type="text" class="input" placeholder="Enter your phone number">
                                </div>
                            </div>
                        </div>

                        <div class="buttons">
                            <a class="button process-button" data-step="step-dot-3">Back</a>
                            <a class="button process-button is-next" data-step="step-dot-5">Next</a>
                        </div>
                    </div>

                    <div id="signup-panel-5" class="process-panel-wrap is-narrow">
                        <div class="form-panel">
                            <img class="success-image" src="assets/img/illustrations/signup/mailbox.svg" alt="">
                            <div class="success-text">
                                <h3>Congratz, you successfully created your account.</h3>
                                <p> We just sent you a confirmation email. PLease confirm your account within 24 hours.</p>
                                <a id="signup-finish" class="button is-fullwidth">Let Me In</a>
                            </div>
                        </div>
                    </div>

                    <div id="signup-panel-6" class="process-panel-wrap is-narrow">
                        <div class="form-panel">
                            <img class="success-image" src="assets/img/illustrations/signup/mailbox.svg" alt="">
                            <div class="success-text">
                                <h3>Congratz, you successfully created your account.</h3>
                                <p> We just sent you a confirmation email. PLease confirm your account within 24 hours.</p>
                                <a id="signup-finish" class="button is-fullwidth">Let Me In</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!--Edit Credit card Modal-->
            <div id="crop-modal" class="modal is-small crop-modal is-animated">
                <div class="modal-background"></div>
                <div class="modal-content">
                    <div class="modal-card">
                        <header class="modal-card-head">
                            <h3>Crop your picture</h3>
                            <div class="close-wrap">
                                <button class="close-modal" aria-label="close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                        </header>
                        <div class="modal-card-body">
                            <div id="cropper-wrapper" class="cropper-wrapper">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Html -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Concatenated js plugins and jQuery -->

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="{{asset('libraries/assets/js/app.js')}}"></script>
        <script src="https://js.stripe.com/v3/"></script>
        <script src="{{asset('libraries/assets/data/tipuedrop_content.js')}}"></script>

        <!-- Core js -->
        <script src="{{asset('libraries/assets/js/global.js')}}"></script>

        <!-- Navigation options js -->
        <script src="{{asset('libraries/assets/js/navbar-v1.js')}}"></script>
        <script src="{{asset('libraries/assets/js/navbar-v2.js')}}"></script>
        <script src="{{asset('libraries/assets/js/navbar-mobile.js')}}"></script>
        <script src="{{asset('libraries/assets/js/navbar-options.js')}}"></script>
        <script src="{{asset('libraries/assets/js/sidebar-v1.js')}}"></script>

        <!-- Core instance js -->
        <script src="{{asset('libraries/assets/js/main.js')}}"></script>
        <script src="{{asset('libraries/assets/js/chat.js')}}"></script>
        <script src="{{asset('libraries/assets/js/touch.js')}}"></script>
        <script src="{{asset('libraries/assets/js/tour.js')}}"></script>

        <!-- Components js -->
        <script src="{{asset('libraries/assets/js/explorer.js')}}"></script>
        <script src="{{asset('libraries/assets/js/widgets.js')}}"></script>
        <script src="{{asset('libraries/assets/js/modal-uploader.js')}}"></script>
        <script src="{{asset('libraries/assets/js/popovers-users.js')}}"></script>
        <script src="{{asset('libraries/assets/js/popovers-pages.js')}}"></script>
        <script src="{{asset('libraries/assets/js/lightbox.js')}}"></script>

        <!-- Landing page js -->

        <!-- Signup page js -->
        <script src="{{asset('libraries/assets/js/signup.js')}}"></script>


</body>

</html>
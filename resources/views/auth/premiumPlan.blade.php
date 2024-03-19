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
    </script>
    <!-- End Google Tag Manager -->

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
                <img src="{{asset('libraries/images/logo/logo_h.png')}}" width="200" height="50" alt="">
            </a>
        </div>
        <div class="outer-panel">
            <div class="outer-panel-inner">
                <div class="process-title">
                    &nbsp;
                    <h2 id="step-title-1" class="step-title is-active">Welcome Hapiverse Socialite, select your subscription plan.</h2>
                </div>

                <div id="signup-panel-1" class="process-panel-wrap is-active">
                    <div class="columns mt-12">


                        <div class="column is-5" style="margin-left:auto; margin-right:300px ;">
                            <div class="account-type">
                                <div class="type-image">

                                    <img class="type-bg light-image" src="{{asset('libraries/assets/img/otp.webp')}}" alt="">
                                </div>
                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                <div class=" button is-rounded is-phantom red-button">{{$error}}</div>
                                @endforeach
                                @endif
                                <form method="POST" action="{{route('planPremium.process')}}">
                                    @csrf
                                    <div class="field">
                                        <label>
                                            Choose your subscription plan
                                        </label>
                                        <input type="hidden" name="email" value="{{$email}}">
                                        <div class="control">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="plans" id="individual" value="individual" required>
                                                <label class="form-check-label" for="individual">Individual</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="plans" id="business" value="business" required>
                                                <label class="form-check-label" for="business">Business</label>
                                                </div>
                                            </div>
                                            <div class="individualPlans individualPlanCombo" style="display:none;">
                                                <select class="form-control" name="plan_id" required>
                                                    <option value="">Select Indivdual Plan</option>
                                                    @foreach($plans as $plan)
                                                        <option value="{{$plan->planId}}">{{$plan->planName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="businessPlans" style="display:none;">
                                                
                                                <select class="form-control businessPlanCombo" name="business_plan_id" required>
                                                    <option value="">Select Business Plan</option>
                                                    @foreach($businessPlans as $businessPlan)
                                                        <option value="{{$businessPlan->planId}}">{{$businessPlan->planName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @if ($errors->has('otp'))
                                        <span class="error text-danger">{{ $errors->first('otp') }}</span>
                                        @endif
                                    </div>
                                    <div class="buttons">
                                        <button type="submit" class="button is-fullwidth process-button">OK</button>


                                    </div>
                                </form>
                            </div>
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

    <!-- Concatenated js plugins and jQuery -->
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
    <script>
        $('input[type=radio][name=plans]').change(function() {
            if (this.value == 'individual') {
                $('.individualPlans').show();
                $('.businessPlans').hide();
                $('.individualPlanCombo').val('');
                $('.businessPlanCombo').val('');
                $('.individualPlanCombo').attr('required',true);
                $('.businessPlanCombo').attr('required',false);
            }
            else{
                $('.individualPlans').hide();
                $('.businessPlans').show();
                $('.businessPlanCombo').val('');
                $('.individualPlanCombo').val('');
                $('.individualPlanCombo').attr('required',false);
                $('.businessPlanCombo').attr('required',true);
            }
        });
    </script>

</body>

</html>
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
        <div class="process-title">
            &nbsp;
            <h2 id="step-title-1" class="step-title is-active">Welcome Hapiverse Socialite, enter your card details for payment.</h2>
        </div>

        <div id="payment-container" class="checkout-container">
            <div class="right" style="margin-left:auto; margin-right:250px ;">
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class=" button is-rounded is-phantom red-button">{{$error}}</div>
                @endforeach
                @endif
                <div class="payment-form">

                    <form action="{{route('stripe.payment')}}" method="post" class="provider-form is-active">
                        @csrf
                        <div id="checkout-contact-section" class="form-section has-margin-bottom">
                            <div class="form-section-header">
                                <h3>Personal Information</h3>
                            </div>
                            <div class="field">
                                <label for="card-element">Email Address</label>
                                <div class="control">
                                    <input class="input" placeholder="Enter your email address" name="email" autofocus>
                                </div>

                            </div>
                            <!-- <div class="field">
                                <label for="card-element">Refference Code</label>
                                <div class="control">
                                    <input class="input" placeholder="Enter your refference code" name="refferenceCode" >
                                </div>

                            </div> -->
                        </div>

                        <div id="checkout-payment-section" class="form-section">
                            <div class="form-section-header">
                                <h3>Payment Information</h3>
                            </div>

                            <div class="field">
                                <label for="card-element">Name on card</label>
                                <div class="control">
                                    <input class="input" placeholder="Enter the name on the credit card" name="cardHolderName">
                                </div>

                            </div>

                            <div class="field">
                                <label for="card-element">Card no</label>
                                <div class="control">
                                    <input class="input" placeholder="Enter the card number" name="card_no">
                                </div>
                            </div>

                            <div class="field">
                                <label for="card-element">CVV</label>
                                <div class="control">
                                    <input class="input" placeholder="Enter the card number" name="cvvNumber">
                                </div>
                                <label for="card-element">Expiration month</label>
                                <div class="control">
                                    <input class="input" placeholder="Enter the card number" name="ccExpiryMonth">
                                </div>
                                <label for="card-element">Expiration year</label>
                                <div class="control">
                                    <input class="input" placeholder="Enter the card number" name="ccExpiryYear">
                                </div>
                            </div>



                        </div>

                        <div class="field is-disclaimer">
                            <p>By clicking on 'Submit Payment', you confirm that you fully agree to our <a href="#">Terms Of
                                    Service</a> and to our <a href="#">Customer's Policy</a>.</p>
                        </div>

                        <div class="field is-button">
                            <div class="buttons has-addons">
                                <button id="payment-button" type="submit" class="button is-solid primary-button">Pay Now</button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>


            <!--Edit Credit card Modal-->
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


</body>

</html>
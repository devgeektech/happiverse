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
                    <h2 id="step-title-1" class="step-title is-active">Welcome Hapiverse Socialite, enter your otp code.</h2>
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
                                
                                <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_test_51MUka3BL7C3orhY4v52eSVAb43J6OF2KqXXAOPbSwEavQqW4YlNqnBZ6YR1AFHt3W4ZwndaCtp3s7m1MqYQCMxOG00pTyvjrtD" id="payment-form">
                                @csrf
                                <input type="hidden" value="{{$email}}" name="email">
                                <div class='form-row row'>
                                   <div class='col-xs-12 col-md-6 form-group required'>
                                      <label class='control-label'>Name on Card</label> 
                                      <input class='form-control' size='4' type='text'>
                                   </div>
                                   <div class='col-xs-12 col-md-6 form-group required'>
                                      <label class='control-label'>Card Number</label> 
                                      <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                                   </div>                           
                                </div>                        
                                <div class='form-row row'>
                                   <div class='col-xs-12 col-md-4 form-group cvc required'>
                                      <label class='control-label'>CVC</label> 
                                      <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                   </div>
                                   <div class='col-xs-12 col-md-4 form-group expiration required'>
                                      <label class='control-label'>Expiration Month</label> 
                                      <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                   </div>
                                   <div class='col-xs-12 col-md-4 form-group expiration required'>
                                      <label class='control-label'>Expiration Year</label> 
                                      <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                   </div>
                                </div>
                              {{-- <div class='form-row row'>
                                 <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>Please correct the errors and try
                                       again.
                                    </div>
                                 </div>
                              </div> --}}
                                <div class="form-row row">
                                   <div class="col-xs-12">
                                      <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                                   </div>
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
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
  var $form = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form = $(".require-validation"),
    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
    $inputs = $form.find('.required').find(inputSelector),
    $errorMessage = $form.find('div.error'),
    valid = true;
    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
        }
    });
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
      if (response.error) {
          $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
      } else {
          /* token contains id, last4, and card type */
          var token = response['id'];
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
      }
  }
});
</script>

</body>

</html>
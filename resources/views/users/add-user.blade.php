<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Hapiverse Socialite</title>
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
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!-- Core CSS -->
<link rel="stylesheet" href="{{asset('libraries/assets/css/app.css')}}">
<link rel="stylesheet" href="{{asset('libraries/assets/css/core.css')}}">

<link rel="stylesheet" href="{{asset('libraries/custom.css')}}">


<body>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class=" button is-rounded is-phantom red-button">{{$error}}</div>
    @endforeach
    @endif
    <form method="POST" action="{{route('registration.perform')}}" enctype="multipart/form-data" id="regForm">
        @csrf
        <input type="hidden" name="userTypeId" value="{{$getBusinessDetail->accountType}}">
        <input type="hidden" name="refferCode" value="{{$refferCode}}">
        <div class="tab">
            @if($getBusinessDetail->accountType==1)
            <h1>Basic Information</h1>

            <p> <label>Email</label>
                <input type="email" class="input" placeholder="Enter your phone no" value="{{$email}}" disabled>
                <input type="hidden" value="{{$email}}" name="email">
            </p>
            <p>
                <label>Full Name</label>
                <input type="text" name="userName" value="{{old('userName')}}" required>
            </p>
            @else
            <h1>Business Information</h1>

            <input type="hidden" value="{{$email}}" name="email">
            <p>
                <label>Business Name</label>
                <input type="text" name="userName" value="{{old('userName')}}" required>
            </p>
            <p>
                <label>Owner Name</label>
                <input type="text" name="ownerName" value="{{old('ownerName')}}" required>
            </p>
            <p>
                <label>Vat Number (Optional)</label>
                <input type="text" name="vat_number" value="{{old('vat_number')}}" required>
            </p>
            @endif
            <p>
                <label>Password</label>
                <input type="password" class="input" placeholder="Enter your passowrd " name="password" required>
            </p>
            <p>
                <label>Confirm Password</label>
                <input type="password" placeholder="Enter your confirmpassowrd " name="confirm_password" required>
            </p>
        </div>
        <div class="tab">
            <h1>Select Interest</h1>
            <p>
                <select class="form-select form-control" aria-label="Default select example" name="userInterest">
                    @foreach($intrest as $int)
                    <option value="{{$int->intrestCategoryId}}">
                        {{$int->intrestCategoryTitle}}</option>
                    @endforeach
                </select>

            </p>

        </div>
        @if($getBusinessDetail->accountType==1)
        <div class="tab">
            <h1>Personal Information</h1>
            <p><label>Marital Status</label>
                <select class="form-select form-control" aria-label="Default select example" name="martialStatus">
                    <option selected>Marital Status</option>
                    <option value="Married">Married</option>
                    <option value="Single">Single</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Other">Other</option>
                </select>
            </p>
            <p>
                <label>DOB</label>
                <input type="date" class="input" placeholder="Enter your DOB " name="DOB" required>
            </p>
            <p>
                <label>Gender</label>
                <select class="form-select form-control" aria-label="Default select example" name="gender">
                    <option selected>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </p>
            <p>
                <label>Phone No</label>
                <input type="text" class="input" placeholder="Enter your phone no" name="phoneNo" value="{{old('phoneNo')}}" required>
            </p>
        </div>
        @endif
        <div class="tab">
            <p> <label>Profile Image</label>
                <input type="file" name="profileImageUrl" required>
            </p>
        </div>
        
        <div class="tab">
            <h1>Additional Information</h1>
            @if($getBusinessDetail->accountType==2)
            <p>
                <label>Hobby</label>
                <input type="text" class="input" placeholder="eg: football, dancing" name="hobby" required>
            </p>
            <p>
                <label>DOB</label>
                <input type="date" class="input" placeholder="Enter your DOB " name="DOB" required>
            </p>
            <p><label>Marital Status</label>
                <select class="form-select form-control" aria-label="Default select example" name="martialStatus">
                    <option selected>Marital Status</option>
                    <option value="Married">Married</option>
                    <option value="Single">Single</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Other">Other</option>
                </select>
            </p>
            
            <p>
                <label>Gender</label>
                <select class="form-select form-control" aria-label="Default select example" name="gender">
                    <option selected>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </p>
            <label>Occupation Title</label>
            <input type="text" name="work_title" placeholder="Enter Work title " required>
            <br>
            <label>Occupation Description</label>
            <input type="text" name="work_description" placeholder="Enter Work Description " required>
            <br>
            <label>Start Year</label>
            <input type="date" name="work_startDate" placeholder="Enter Work Start Date " required>
            <br>
            <label>End Year</label>
            <input type="date" name="work_endDate" placeholder="Enter Work End Date " required>
            <br>
            <label>Location</label>
            <input type="text" name="work_location" placeholder="Enter Work Location " required>
            <br>
            <!--<h1>Education</h1>-->
            <label>Education Title</label>
            <input type="text" name="education_title" placeholder="Enter Education title " required>
            <br>
            <label>Start Year</label>
            <input type="date" name="education_startDate" placeholder="Enter Start Date " required>
            <br>
            <label>End Year</label>
            <input type="date" name="education_endDate" placeholder="Enter End Date " required>
            <br>
            <label>Level</label>
            <input type="text" name="education_level" placeholder="Enter Education Level" required>
            <label>Location</label>
            <input type="text" name="education_location" placeholder="Enter Education Location " required>
            <br>
            @endif
            <label>Religion</label>
            <input type="text" class="input" placeholder="Enter your City" name="religion" required>
            <br>
            <label>Hair Color</label>
            <select class="form-select form-control" aria-label="Default select example" name="hairColor">
                <option selected>Hair Color</option>
                <option value="Black">Black</option>
                <option value="Grey">Grey</option>
                <option value="Brown">Brown</option>
                <option value="Red">Red</option>
            </select>
            <br>
            <label>Height</label>
            <input type="text" class="input" placeholder="Enter your Country" name="height" required>
            <br>
            @if($getBusinessDetail->accountType==2)
            <input type="submit" name="submit" value="Store Profile">
            @endif
        </div>
        @if($getBusinessDetail->accountType==1)
        <div class="tab">

            <h1>Education</h1>
            <label>Education Title</label>
            <input type="text" name="education_title" placeholder="Enter Education title " required>
            <br>
            <label>Start Year</label>
            <input type="date" name="education_startDate" placeholder="Enter Start Date " required>
            <br>
            <label>End Year</label>
            <input type="date" name="education_endDate" placeholder="Enter End Date " required>
            <br>
            <label>Level</label>
            <input type="text" name="education_level" placeholder="Enter Education Level" required>
            <label>Location</label>
            <input type="text" name="education_location" placeholder="Enter Education Location " required>
            <br>
            <!--<label>Currently Studying</label>-->
            <!--<input type="checkbox" name="currently_studying">-->
            <br>
        </div>
        <div class="tab">

            <h1>Occupation</h1>
            <label>Occupation Title</label>
            <input type="text" name="work_title" placeholder="Enter Work title " required>
            <br>
            <label>Occupation Description</label>
            <input type="text" name="work_description" placeholder="Enter Work Description " required>
            <br>
            <label>Start Year</label>
            <input type="date" name="work_startDate" placeholder="Enter Work Start Date " required>
            <br>
            <label>End Year</label>
            <input type="date" name="work_endDate" placeholder="Enter Work End Date " required>
            <br>
            <label>Location</label>
            <input type="text" name="work_location" placeholder="Enter Work Location " required>
            <br>
            <!--<label>Currently Working</label>-->
            <!--<input type="checkbox" name="current_working" value="1">-->
            <br>
            <input type="submit" name="submit" value="Store Profile">
        </div>
        @endif

        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>


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
    <script src="{{asset('libraries/custom.js')}}"></script>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("prevBtn").style.display = "none";
                document.getElementById("nextBtn").style.display = "none";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            // y = x[currentTab].getElementsByTagName("input");
            // // A loop that checks every input field in the current tab:
            // for (i = 0; i < y.length; i++) {
            //     // If a field is empty...
            //     if (y[i].value == "") {
            //         // add an "invalid" class to the field:
            //         y[i].className += " invalid";
            //         // and set the current valid status to false
            //         valid = false;
            //     }
            // }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>

</body>

</html>
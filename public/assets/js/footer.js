   function addInterest(){

        var value = $('#interest').val();
        var value2 = $("#interest :selected").text();

        console.log(value);
        $.ajax({
             url: "add-interest/"+ value,
             success: function(data) {
                console.log(data);
                $('#interest_list').append(` <p class="lead d-flex justify-content-between mb-2">${value}

                            <a href=""><i class="fas fa-trash-alt me-1 text-danger"></i></a>


                        </p>`);
            }
         });
    }

  $(document).ready(function() {
    var page = 2; // initialize the page number to load the next set of posts
    var loading = false; // prevent multiple requests while one is being processed

    $(window).scroll(function() {
        // calculate the distance from the top of the document to the bottom of the window
        var scrollTop = $(window).scrollTop();
        var windowHeight = $(window).height();
        var documentHeight = $(document).height();
        var scrollBottom = documentHeight - (scrollTop + windowHeight);

        // if the user has scrolled to the bottom of the page and no requests are currently being processed
        if (scrollBottom <= 100 && !loading) {
            loading = true; // set the loading flag to prevent multiple requests
            $('.loadMore').html('Loading...');

            // send an AJAX request to load the next set of posts
            $.get('/posts?page=' + page, function(data) {
                if (data.trim().length == 0) {
                    // if there are no more posts to load, remove the load more button
                    $('.loadMore').html("We don't have more data to display :(");
                } else {
                    // append the new posts to the container and increment the page number
                    $('#posts').append(data);
                    page++;
                }
                loading = false; // reset the loading flag
            });
        }
    });
});


 $(".chat_remove").on("click",function() {
         alert("delete");
         var value = $(this).val();
         console.log(value);
         $.ajax({
             url: "delete-chat/"+ value,
             success: function(data) {
                console.log(data);
                location.reload();

            }
         });
    });




    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    APP_URL_ = 'https://hapiverse.com/public/searchWebUser';
    $('#headerSearch2').on('keyup', function() {

        $value = $(this).val();
        if($value!=""){
            $.ajax({
                type: 'get',
                url: APP_URL_ ,
                data: {
                    'search': $value
                },
                success: function(data) {
                    var obj=eval(data);
                    if(obj[1]>0){
                        $('#businessListUser').hide();
                        $('#businessListNewUser').html(obj[3]);
                    }else{
                        $('#businessListUser').show();
                        $('#businessListNewUser').empty();
                    }
                    if(obj[0]>0){
                        $('#peopleListUser').hide();
                        $('#peopleListNewUser').html(obj[2]);

                    }else{
                        $('#peopleListUser').show();
                        $('#peopleListNewUser').empty();
                    }

                }
            });
        }else{
            $('#businessListUser').show();
            $('#businessListNewUser').empty();
            $('#peopleListUser').show();
            $('#peopleListNewUser').empty();
        }

    });
    APP_URL_LIKE = 'http://127.0.0.1:8000/like';


        $(".heart").on("click",function() {
            var btnValue = $(this).attr('value');
            var $this = $(this);
            $.ajax({
                type: "GET",
                url: APP_URL_LIKE + '/' + btnValue,
                check : "#counts"+btnValue,
                success: function(result) {
                    if (result.status == 'Success') {
                        $this.addClass('active');
                    }
                    else {
                        $this.removeClass('active');
                    }
                    console.log(result);
                    console.log("#counts"+btnValue);
                    console.log("#check"+btnValue);
                    $("#counts" + btnValue).html(result["postlikes"]);
                    $("#counts" + btnValue + "model").html(result["postlikes"]);
                    $("#check" + btnValue).html(result["image"]);
                    $("#check" + btnValue + "model").html(result["image"]);
                },
                error: function(result) {
                    console.log(result);
                }
            });
        });

    $('.select_color').click(function(){
        $('#background_color').val($(this).attr('data-color'));
    });
    $('.addtoplaylist').click(function(e){
      APP_NEW_URL = 'https://hapiverse.com/public/addtoplaylist';
      console.log(APP_NEW_URL);
      e.preventDefault();
      var id=$(this).attr('data-id');
      var music_href=$('.getHref'+id).attr('href');
      var music_title=$('.music_title'+id).html();
      var music_id=$('.musicId'+id).val();
      var music_image=$('.dynamicCover'+id).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      $.ajax({
         'url':APP_NEW_URL,
         'type':'POST',
         'data':{"music_href":music_href,"music_title":music_title,"music_id":music_id,"music_image":music_image},
         success:function(data){
             if(data=="1"){
                 alert("Music added to playlist!");
                 window.location.href="/musics";
             }else{
                 alert(data);
             }
         },
      });
    })
    //----------------------------------------------------------

  var d1 = document.getElementById('postLabel');
            d1.insertAdjacentHTML('afterend', '<input id= "backgroundImage" type = "hidden" id = "background_image" name = "background_image" >');

            setInterval(function(){

            let element = document.querySelector('#postLabel');



            let style = getComputedStyle(element);

            let backgroundImage = style.backgroundImage;

            if(backgroundImage  != 'none'){

                let myArray2 = backgroundImage.split("url(\"");
                let myArray3= myArray2[1];
                let myArray4= myArray3.split("\")");
                let myArray5= myArray4[0].split("https://hapiverse.com/public/");
                console.log("myArray5[1]");
                console.log(myArray5[0]);
                document.getElementById('backgroundImage').value = myArray5[0];

            }

            }, 5000);
   //----------------------------------------------------------
      document.getElementById("video").onchange = function(event) {

                document.getElementById("videodisplay").style.display = "block";
              let file = event.target.files[0];
              let blobURL = URL.createObjectURL(file);
              document.getElementById("videodisplay").src = blobURL;

            }

        function initAutocomplete() {
            const input1 = document.getElementById("location_text");
            const options = {
                // componentRestrictions: { country: "GB" },
                fields: ["address_components", "geometry", "icon", "name"]
            };
            const autocomplete1 = new google.maps.places.Autocomplete(input1, options);

            autocomplete1.addListener("place_changed", () => {
                // debugger;
                const place = autocomplete1.getPlace();
                if (!place.geometry || !place.geometry.location) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }
                document.getElementById("put_lat_lng").value = place.geometry.location.lat() + ',' + place.geometry.location.lng();
            });

            var locations = [
                ['Bondi Beach', -33.890542, 151.274856, 4],
                ['Coogee Beach', -33.923036, 151.259052, 5],
                ['Cronulla Beach', -34.028249, 151.157507, 3],
                ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
                ['Maroubra Beach', -33.950198, 151.259302, 1]
            ];

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: new google.maps.LatLng(-33.92, 151.25),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;
            const icon = {
                url: "https://business-indermediate.marianatech.co.uk/storage/image/defaultLogo.jpg", // url
                scaledSize: new google.maps.Size(50, 50), // scaled size
                origin: new google.maps.Point(0, 0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
            };
            // const image =
            //   "https://business-indermediate.marianatech.co.uk/storage/image/defaultLogo.jpg";
            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    icon: icon,
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }
   //----------------------------------------------------------
    setInterval(function() {
          var optionValue = $('#search').val();
            if(optionValue){
                $("#searchlist").show();
            } else{
                 $("#searchlist").hide();
            }
    }, 1000);

    APP_URL = 'https://hapiverse.com/public/search';

    $('#search').on('keyup', function() {

        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: APP_URL ,
            data: {
                'search': $value
            },
            success: function(data) {
                $('#searchlist').html(data);

            }
        });
    });

   //----------------------------------------------------------
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
     $(document).ready(function(){

    $(document).on('click', '#commentDisplay', function(e){
        e.preventDefault();

        var url = $(this).data('url');

        $('#dynamic-conten').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
        })
        .done(function(data){
            console.log(data);
            $('#dynamic-content').html('');
            $('#dynamic-content').html(data); // load response
            $('#modal-loader').hide();        // hide ajax loader
        })
        .fail(function(){
            $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });

    });

});

 $(document).ready(function(){

    $(document).on('click', '#postModel', function(e){

        e.preventDefault();

        var url = $(this).data('url');

        $('#postModelContent').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
        })
        .done(function(data){
            console.log(data);
            $('#postModelContent').html('');
            $('#postModelContent').html(data); // load response
            $('#modal-loader').hide();        // hide ajax loader
        })
        .fail(function(){
            $('#postModelContent').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });

    });

});

$(document).ready(function(){

    $(document).on('click', '#messageModel', function(e){

        e.preventDefault();

        var url = $(this).data('url');

        $('#messageModelContent').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
        })
        .done(function(data){
            console.log(data);
            $('#messageModelContent').html('');
            $('#messageModelContent').html(data); // load response
            $('#modal-loader').hide();        // hide ajax loader
        })
        .fail(function(){
            $('#messageModelContent').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });

    });

});
$(document).on('click', '#alwayslocation', function(e){
     confirm("Turn Your Location ");

    });


//----------------------------------------------------------
   // Import the functions you need from the SDKs you need

// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyDhGi0PoHujJci_NaWpO2cZTeWwZPUlXEA",
  authDomain: "hapiverse-fe7b0.firebaseapp.com",
  projectId: "hapiverse-fe7b0",
  storageBucket: "hapiverse-fe7b0.appspot.com",
  messagingSenderId: "92892917559",
  appId: "1:92892917559:web:0bd045d9c31dea9962f4b2",
  measurementId: "G-Y017QSWVH8"
};



// Initialize Firebase
// const app = initializeApp(firebaseConfig);
// const analytics = getAnalytics(app);
const firebaseApp = firebase.initializeApp({
  apiKey: 'AIzaSyDhGi0PoHujJci_NaWpO2cZTeWwZPUlXEA',
  authDomain : "hapiverse-fe7b0.firebaseapp.com" ,
  projectId : "hapiverse-fe7b0" ,
  storageBucket : "hapiverse-fe7b0.appspot.com" ,
  messagingSenderId : "92892917559" ,
  appId : "1:92892917559:web:0bd045d9c31dea9962f4b2" ,
  measurementId : "G-Y017QSWVH8",
});
const messaging = firebase.messaging();
// Add the public key generated from the console here.
//getToken(messaging, {vapidKey: "BBzf3Bq7zCsR3IuSTaZObx642YaU7xPfSxzYcrW6e7XZx0ixkNlRFVcBfCaEF9sjPwKrgA9bkmSmzsOm4mrw8_M"});
messaging.usePublicVapidKey("BG-X47tV8jVr64NREyrYB7AOXgipzHAHZAdGjdYmDN9q9Z8h7tFM8GqiKUpftg9A7yCLnVvn3g8Z3ES9wUsfpRA");

 console.log("check");
function sendTokenServer(fcm_token){
    let user_id = "8iq6e0gue7";

axios.post('/save-token', {
    fcm_token,user_id
  }).then(res => { console.log(res);});
 }

 function retreiveToken(){
     messaging.getToken({ vapidKey: 'BG-X47tV8jVr64NREyrYB7AOXgipzHAHZAdGjdYmDN9q9Z8h7tFM8GqiKUpftg9A7yCLnVvn3g8Z3ES9wUsfpRA' }).then((currentToken) => {
          if (currentToken) {
            // Send the token to your server and update the UI if necessary
            console.log("Token Recieved:"+ currentToken);
            sendTokenServer(currentToken);
            // ...
          } else {
            // Show permission request UI
            alert("You should allow notifications");
            // ...
          }
        }).catch((err) => {
          console.log('An error occurred while retrieving token. ', err);
          setTokenSentToServer(false);
          // ...
    });
 }
 retreiveToken();
//  message.onTokenRefresh(()=>{
//      retreiveToken();
//  });
 // Get registration token. Initially this makes a network call, once retrieved
// subsequent calls to getToken will return from cache.



 $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


  $("#chatgptform").submit(function(e){

    e.preventDefault();

      //FORM_URL = 'https://hapiverse.com/public/dashboard';
      FORM_URL = 'https://hapiverse.com/public/chatgpt/ask';


        var message = $('#chatgptmessage').val();
        $("#chatgptreply").append('<div class="message-item reply" ><div class="message"  ><div class="text-wrapper"><p class="comment-text">'+message+'</p></div></div></div>');
         //$("#sent").append('<div class="message-item sent" ><div class="message"  ><div class="text-wrapper"><p class="comment-text">'+message+'</p></div></div></div>');
        //sentMessage(message)
        var form_data = new FormData();
        form_data.append("message",message);
        console.log($(this).serialize());
        $.ajax({
         url:FORM_URL,
          method:'POST',
          data: new FormData( this ),
          contentType:false,
          cache:false,
          processData:false,
          beforeSend:function(){

          },
          success:function(data){

            console.log(data.response);
            $("#chatgptreply").append('<div class="message-item sent" ><div class="message"  ><div class="text-wrapper"><p class="comment-text">'+data.response+'</p></div></div></div>');

            }
        });
    });



$("#submitform").submit(function(e){
// alert("check");
    e.preventDefault();

      FORM_URL = 'https://hapiverse.com/public/dashboard';


        var message = $('#message').val();
        $("#reply").append('<div class="message-item reply" ><div class="message"  ><div class="text-wrapper"><p class="comment-text">'+message+'</p></div></div></div>');
         //$("#sent").append('<div class="message-item sent" ><div class="message"  ><div class="text-wrapper"><p class="comment-text">'+message+'</p></div></div></div>');
        //sentMessage(message)
        var form_data = new FormData();
        form_data.append("message",message);
        console.log($(this).serialize());
        $.ajax({
         url:FORM_URL,
          method:'POST',
          data: new FormData( this ),
          contentType:false,
          cache:false,
          processData:false,
          beforeSend:function(){
            $('#msg').html('Loading......');
          },
          success:function(data){

            // console.log(data);

            }
        });
    });


 messaging.onMessage((payload)=>{
    console.log("message recieved");
    message = payload.data["message"];
    // location.reload();
    // $("#sent").append('<div class="message-item sent" ><div class="message"  ><div class="text-wrapper"><p class="comment-text">'+message+'</p></div></div></div>');


});
//  for( var i = 1; i < 5; i++ ) {
//      var n =1;
//   $("#messagelist"+i).on("click", function () {
//       alert("check");

//     $("#chatBox").removeClass("d-block");
//     $("#chatSingleBox"+i).addClass("d-block");
//   });
//   $("#closeChatSingleBox").on("click", function () {
//     $("#chatSingleBox"+i).removeClass("d-block");
//   });
//   var n= n+1;
//  }

$("#messagelist1").on("click", function () {
    $("#chatBox").removeClass("d-block");
    $("#chatSingleBox1").addClass("d-block");
  });
  $("#closeChatSingleBox1").on("click", function () {
    $("#chatSingleBox1").removeClass("d-block");
  });


  $("#messagelist2").on("click", function () {
    $("#chatBox").removeClass("d-block");
    $("#chatSingleBox2").addClass("d-block");
  });
  $("#closeChatSingleBox2").on("click", function () {
    $("#chatSingleBox2").removeClass("d-block");
  });

  $("#messagelist3").on("click", function () {
    $("#chatBox").removeClass("d-block");
    $("#chatSingleBox3").addClass("d-block");
  });
  $("#closeChatSingleBox3").on("click", function () {
    $("#chatSingleBox3").removeClass("d-block");
  });

  $("#messagelist4").on("click", function () {
    $("#chatBox").removeClass("d-block");
    $("#chatSingleBox4").addClass("d-block");
  });
  $("#closeChatSingleBox4").on("click", function () {
    $("#chatSingleBox4").removeClass("d-block");
  });

  function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request
                    $.ajax({
                        url: "log",
                        cache: false,
                        success: function (html) {
                            $("#chatbox").html(html); //Insert chat log into the #chatbox div
                            //Auto-scroll
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
                            if(newscrollHeight > oldscrollHeight){
                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                            }
                        }
                    });
                }
setInterval (loadLog, 2500);

$(document).ready(function() {
  $('#image').change(function() {
    var file = this.files[0];
    if (file) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#image-preview').attr('src', e.target.result).show();
      }
      reader.readAsDataURL(file);
    } else {
      $('#image-preview').attr('src', '').hide();
    }
  });
});


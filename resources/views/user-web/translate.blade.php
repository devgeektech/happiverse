
@if(Auth::user()->userTypeId==1)
    @include('user-web.layouts.head')
    @include('user-web.layouts.header')
@else
    @include('business.layouts.head')
    @include('business.layouts.header')
@endif
<div class="main-content">
    <section class="home">
        <div class="container">
            <div class="row" style = "margin-top:80px">
                @if(Auth::user()->userTypeId==1)
                    @include('user-web.layouts.sidebar')
                @else
                    @include('business.layouts.sidebar')
                @endif
                <div class="col-lg-9" style = "margin-top:100px">
                    <div class="card business-single-card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="input-wrapper">
                                   
                                       <select class="form-select form-control fromLanguage" aria-label="Default select example" required name="plan_id">
                                            <option value="en-GB" selected>Select From Language</option>
                                            <option value="af">Afrikaans</option>
                                            <option value="sq">Albanian</option>
                                            <option value="ar">Arabic</option>
                                            <option value="az">Azerbaijani</option>
                                            <option value="eu">Basque</option>
                                            <option value="ZH">Chinese (Mandarin)</option>
                                            <option value="CS">Czech</option>
                                            <option value="DA">Danish</option>
                                            <option value="NL">Dutch</option>
                                            <option value="en-GB">English</option>
                                            <option value="ET">Estonian</option>
                                            <option value="ES">Esperanto</option>
                                            <option value="FR">French</option>
                                            <option value="FI">Filipino</option>
                                            <option value="KA">Georgian</option>
                                            <option value="DE">German</option>
                                            <option value="GU">Gujarati</option>
                                            <option value="HI">Hindi</option>
                                            <option value="HU">Hungarian</option>
                                            <option value="HT">Haitian Creole</option>
                                            <option value="LA">Latin</option>
                                            <option value="LV">Latvian</option>
                                            <option value="LT">Lithuanian</option>
                                            <option value="OD">Odia</option>
                                            <option value="RU">Russian</option>
                                            <option value="SR">Serbian</option>
                                            <option value="ES">Spanish</option>
                                            <option value="UR">Urdu</option>
                                            <option value="CY">Welsh</option>
                                            <option value="XH">Xhosa</option>
                                            <option value="ZU">Zulu</option>
                                            
                                            
                                                                                        
                                            
                                            
                                            
                                            
                                            
                                      
                                            
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-wrapper">
                                    
                                       <select class="form-select form-control toLanguage" aria-label="Default select example" required name="plan_id">
                                            <option value="en-GB" selected>Select To Language</option>
                                            <option value="af">Afrikaans</option>
                                            <option value="sq">Albanian</option>
                                            <option value="ar">Arabic</option>
                                            <option value="az">Azerbaijani</option>
                                            <option value="eu">Basque</option>
                                             <option value="bn">Bengali</option>
                                            <option value="bg">Bulgarian</option>
                                            <option value="ca">Catalan</option>
                                            <option value="zh-CN">Chinese Simplified</option>
                                            <option value="ZH">Chinese (Mandarin)</option>
                                            <option value="hr">Croatian</option>
                                            <option value="CS">Czech</option>
                                            <option value="DA">Danish</option>
                                            <option value="NL">Dutch</option>
                                            <option value="en-GB">English</option>
                                            <option value="ET">Estonian</option>
                                            <option value="EO">Esperanto</option>
                                            <option value="FR">French</option>
                                            <option value="tl">Filipino</option>
                                            <option value="fr">French</option>
                                            <option value="KA">Georgian</option>
                                            <option value="DE">German</option>
                                            <option value="el">Greek</option>
                                            <option value="GU">Gujarati</option>
                                            <option value="HI">Hindi</option>
                                            <option value="HU">Hungarian</option>
                                            <option value="HT">Haitian Creole</option>
                                            <option value="LA">Latin</option>
                                            <option value="LV">Latvian</option>
                                            <option value="LT">Lithuanian</option>
                                            <option value="OD">Odia</option>
                                            <option value="RU">Russian</option>
                                            <option value="SR">Serbian</option>
                                            <option value="ES">Spanish</option>
                                            <option value="UR">Urdu</option>
                                            <option value="CY">Welsh</option>
                                            <option value="XH">Xhosa</option>
                                            <option value="ZU">Zulu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="input-wrapper mb-2">
                               <textarea class="form-control text" id="text" row="3" placeholder="Type text"></textarea>
                            </div>
                            <div class="input-wrapper">
                               <textarea class="form-control converted" row="3" placeholder="Converted text" disabled></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>

<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="js/jquery-1.11.2.min.js"></script>
<script>

    $(".text").on('change keyup paste', function() {
        
       
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", url, true);
    xmlhttp.setRequestHeader("Access-Control-Allow-Headers", "*");
    xmlhttp.setRequestHeader('Access-Control-Allow-Origin', '*');
        var sourceText = $('textarea#text').val();
        var sourceLang = $(".fromLanguage").val();
        var targetLang = $(".toLanguage").val();
        // if(sourceText=="" || sourceLang=="" || targetLang==""){
        //     alert("Something went wrong.");
        //     return false;
        // }
       // var url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl="+ sourceLang + "&tl=" + targetLang + "&dt=t&q=" + encodeURI(sourceText);
        var url = `https://api.mymemory.translated.net/get?q=${sourceText}&langpair=${sourceLang}|${targetLang}`;
    //     fetch(url)
    // .then((res) => res.json())
    // .then((data) => {
    //  $('.converted').html( data.responseData.translatedText);
    //   data.matches.forEach((data) => {
    //     if (data.id === 0) {
    //       $('.converted').html(data.translation);
    //     }
    //   });
        $.getJSON(url, function(data) {
            
            $('.converted').html(data.responseData.translatedText);
            // console.log(data[0][0][0]);
        });
    });
    $(".fromLanguage").on('change', function() {
        var sourceText = $('textarea#text').val();
        var sourceLang = $(".fromLanguage").val();
      
        // var targetLang = $(".toLanguage").val();
        var targetLang = 'en';
        // if(sourceText==""){
        //     alert("Something went wrong.");
        //     return false;
        // }
       // var url = "https://translate.google.com/translate_a/single?client=gtx&sl="+ sourceLang + "&tl=" + targetLang + "&dt=t&q=" + encodeURI(sourceText);
         var url = `https://api.mymemory.translated.net/get?q=${sourceText}&langpair=${sourceLang}|${targetLang}`;
         console.log(url);
        var request = new XMLHttpRequest();
  request.open('GET', url, true);

  request.onload = () => {
    if (request.status >= 200 && request.status < 400) {
      // Success!
      let data = JSON.parse(request.responseText);
      let finaltext = '';
      for (let i = 0; i < data[0].length; i++) {
        finaltext += data[0][i][0];
      }
      $('#translated').value = finaltext;
    }
  };
  request.send();
        $.getJSON(url, function(data) {
            $('.converted').html(data.responseData.translatedText);
            console.log(data[0][0][0]);
        });
    });
    $(".toLanguage").on('change', function() {
        var sourceText = $('textarea#text').val();
        var sourceLang = $(".fromLanguage").val();
        var targetLang = $(".toLanguage").val();
        // if(sourceText==""){
        //     alert("Something went wrong.");
        //     return false;
        // }
        //var url = "https://translate.google.com/translate_a/single?client=gtx&sl="+ sourceLang + "&tl=" + targetLang + "&dt=t&q=" + encodeURI(sourceText);
        var url = `https://api.mymemory.translated.net/get?q=${sourceText}&langpair=${sourceLang}|${targetLang}`;
        console.log(url);
        $.getJSON(url, function(data) {
            $('.converted').html(data.responseData.translatedText);
        });
    });
</script>

{{--@if(Auth::user()->userTypeId==1)
    @include('user-web.layouts.footer')
@else
    @include('business.layouts.footer')
@endif--}}

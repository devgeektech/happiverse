
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
            <div class="row">
                @if(Auth::user()->userTypeId==1)
                    @include('user-web.layouts.sidebar')
                @else
                    @include('business.layouts.sidebar')
                @endif
                <div class="col-lg-9">
                    <div class="card business-single-card">
                        <div class="card-body">
                            <h3 class="card-title text-start mb-3">Translator</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-wrapper mb-3">
                                       <select class="form-select form-control fromLanguage" aria-label="Default select example" required name="plan_id">
                                            <option value="" selected>Select From Language</option>
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
                                            <option value="EN">English</option>
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
                                            <option value="ES">Spanish</option>
                                            <option value="SR">Serbian</option>
                                            <option value="TE">Telugu</option>
                                            <option value="UR">Urdu</option>
                                            <option value="CY">Welsh</option>
                                            <option value="XH">Xhosa</option>
                                            <option value="ZU">Zulu</option>
                                            
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-wrapper mb-3">
                                       <select class="form-select form-control toLanguage" aria-label="Default select example" required name="plan_id">
                                            <option value="" selected>Select To Language</option>
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
                                            <option value="EN">English</option>
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
                                            <option value="ES">Spanish</option>
                                            <option value="SR">Serbian</option>
                                            <option value="TE">Telugu</option>
                                            <option value="UR">Urdu</option>
                                            <option value="CY">Welsh</option>
                                            <option value="XH">Xhosa</option>
                                            <option value="ZU">Zulu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="input-wrapper mb-3">
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
@if(Auth::user()->userTypeId==1)
    @include('user-web.layouts.footer')
@else
    @include('business.layouts.footer')
@endif
<script>
$.ajaxSetup({
    headers: {
        'Access-Control-Allow-Origin': '*',
        'Access-Control-Allow-Methods': 'GET, POST, PUT, DELETE, OPTIONS',
        'Access-Control-Allow-Headers': 'Origin, Content-Type, Accept, Authorization, X-Request-With',
        'Access-Control-Allow-Credentials': 'true'
    }
});
// header('Access-Control-Allow-Origin: * ');
// header('Access-Control-Allow-Methods:
// POST, GET, OPTIONS, PUT, DELETE');
// header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');

    $(".text").on('change keyup paste', function() {
        var sourceText = $('textarea#text').val();
        var sourceLang = $(".fromLanguage").val();
        var targetLang = $(".toLanguage").val();
        // if(sourceText=="" || sourceLang=="" || targetLang==""){
        //     alert("Something went wrong.");
        //     return false;
        // }
        var url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl="+ sourceLang + "&tl=" + targetLang + "&dt=t&q=" + encodeURI(sourceText);
        
        $.getJSON(url, function(data) {
            $('.converted').html(data[0][0][0]);
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
        var url = "https://translate.google.com/translate_a/single?client=gtx&sl="+ sourceLang + "&tl=" + targetLang + "&dt=t&q=" + encodeURI(sourceText);
         var url = "https://translate.google.com/translate_a/single?client=gtx&sl=" 
            + sourceLang + "&tl=" + targetLang + "&dt=t&q=" + encodeURI(sourceText);
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
            $('.converted').html(data[0][0][0]);
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
        var url = "https://translate.google.com/translate_a/single?client=gtx&sl="+ sourceLang + "&tl=" + targetLang + "&dt=t&q=" + encodeURI(sourceText);
        
        $.getJSON(url, function(data) {
            $('.converted').html(data[0][0][0]);
        });
    });
</script>
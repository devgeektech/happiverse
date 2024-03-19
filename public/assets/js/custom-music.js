// Create a WaveSurfer instance
var wavesurfer;

// Init on DOM ready
document.addEventListener("DOMContentLoaded", function () {
  wavesurfer = WaveSurfer.create({
    container: "#waveform",
    waveColor: "#ffffff",
    progressColor: "#caaf66",
    height: 80,
    barWidth: 3,
    barGap: 3,
    barRadius: 3,
  });
});

// Bind controls
document.addEventListener("DOMContentLoaded", function () {
  let playPause = document.querySelector("#playPause");
  playPause.addEventListener("click", function () {
    wavesurfer.playPause();
  });

  // wavesurfer.on("play", function () {
  //   if (this.play() == true) {
  //     console.log("playing");
  //   } else {
  //     console.log("stopped");
  //   }
  // });
  // setInterval(function(){
  //   var wavesurfer;

  //   if (wavesurfer.audioprocess == true) {
  //     console.log("playing");
  //   } else {
  //     console.log("stopped");
  //   }

  // }, 3000);

  // Toggle play/pause text
  wavesurfer.on('play', function () {
    document.querySelector(".tracks-list").classList.add('playing');
    document.getElementById("pauseIcon").style.display = "none";
    document.getElementById("playIcon").style.display = "block";
    document.querySelector(".audio-spectrum").style.display = "block";
    document.querySelector(".track-img-wrapper .play").style.display = "none";
  });
  wavesurfer.on("pause", function () {
    document.querySelector(".tracks-list").classList.remove('playing');
    document.getElementById("pauseIcon").style.display = "block";
    document.getElementById("playIcon").style.display = "none";
    document.querySelector(".audio-spectrum").style.display = "none";
    document.querySelector(".track-img-wrapper .play").style.display = "block";
  });

  // The playlist links
  let links = document.querySelectorAll("#playList a");
  let currentTrack = 0;

  // Load a track by index and highlight the corresponding link
  let setCurrentSong = function (index) {
    links[currentTrack].classList.remove("active");
    currentTrack = index;
    links[currentTrack].classList.add("active");
    wavesurfer.load(links[currentTrack].href);
  };

  // Load the track on click
  Array.prototype.forEach.call(links, function (link, index) {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      setCurrentSong(index);
    });
  });

  // Play on audio load
  // wavesurfer.on("ready", function () {
  //   wavesurfer.play();
  // });
  $(".getMusicDetails").on("click", function () {
    setTimeout(function(){
      wavesurfer.play();
    }, 1000);
    var id=$(this).attr('data-id');
    $('.addition').html($(this).find('h5.track-title').html());
    $('#additionImg').attr('src',$('.dynamicImg'+id).attr('src'));
    $('#additionImgCover').attr('src',$('.dynamicCover'+id).val());
    $('.audio-spectrum').hide();
    $('#grill'+id).show();
  });

  wavesurfer.on("error", function (e) {
    console.warn(e);
  });

  // Go to the next track on finish
  wavesurfer.on("finish", function () {
    setCurrentSong((currentTrack + 1) % links.length);
  });

  // Load the first track
  setCurrentSong(currentTrack);
});

// // });
// var wavesurfer = WaveSurfer.create({
//   container: '#waveform'
// });
// wavesurfer.load('http://127.0.0.1:5500/assets/audio/shapeofyou.mp3');

// wavesurfer.on('ready', function () {
//   wavesurfer.play();
// });

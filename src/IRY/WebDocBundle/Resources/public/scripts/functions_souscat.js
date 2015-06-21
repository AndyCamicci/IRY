
$(document).ready(function() {


  $(".subnav .menu-deroulant a").on("click", function(e) {
    var title = $(this).attr("data-title");
    console.log(title);
    localStorage.setItem("video-title", title);
    e.stopPropagation();
  });



  if (typeof videosSources == 'undefined') {
    return false;
  }

  var currentVideo = 1;
  function playVideo(num) {
    
    if (currentVideo != num) {
     currentVideo = num; 
     $("#v1").find("source").attr("src", videosSources[num - 1]);
     videoElement.load();
    } else {
      var timeSeconds = percent * videoElement.duration / 100;
      if (isNaN(timeSeconds) == false) {

        console.log("set", timeSeconds);

        videoElement.currentTime = Math.round(timeSeconds);
        videoElement.play();
        $(".pause").fadeOut();
        
      } else {
        console.error("NaN", percent, videoElement.duration);
      }
    }
  }

  var percent = 0;
  var videoElement = $("#v1").get(0);

  videoElement.addEventListener('timeupdate', function(e) {
    var currentTime = e.srcElement.currentTime;
    var totalTime = e.srcElement.duration;

    var percentTimeCurrentVideo = currentTime * 100 / totalTime;

    // console.log("percentTimeCurrentVideo", percentTimeCurrentVideo);
    if (currentVideo > videos.length) {
      var posEndVideo = $("#defile").width();
    } else {
      var parentOffset = videos[currentVideo - 1].parent().offset(); 
      var posEndVideo = videos[currentVideo - 1].offset().left - parentOffset.left;  
    }

    // console.log(currentVideo);
    // console.log(videos);

    if (currentVideo == 1) {
      var posStartVideo = 0;
    } else if (currentVideo > 1) {
      var parentOffset = videos[currentVideo - 2].parent().offset(); 
      var posStartVideo = videos[currentVideo - 2].offset().left - parentOffset.left;
    }
    
   
    // console.log("posStartVideo", posStartVideo);
    // console.log("posEndVideo", posEndVideo);

    // var percentVideoFromTotal = ((posEndVideo - posStartVideo) * 100) / $("#defile").width();
    // console.log("percentTimeCurrentVideo", percentTimeCurrentVideo);

    var dureeVideo = posEndVideo - posStartVideo;
    // console.log("dureeVideo", dureeVideo);
    var cursorV = posStartVideo + percentTimeCurrentVideo * dureeVideo / 100;
    var xMax = $("#defile").width();
    var cursorWPercent = cursorV * 100 / xMax;
    // var curWidth = percentVideoFromTotal * percentTimeCurrentVideo / 100;

    // curWidth =  percentVideoFromTotal * 100 / $("#defile").width() + curWidth;
    // console.log(dureeVideo);
    
    $("#precharge").width(cursorWPercent + "%");

    console.log(percentTimeCurrentVideo);
    if (percentTimeCurrentVideo >= 100) {
      console.log("next");
      percent = 0;
      playVideo(currentVideo + 1);
    }

  });

  videoElement.addEventListener('loadedmetadata', function() {
    var timeSeconds = percent * videoElement.duration / 100;
    videoElement.currentTime = Math.round(timeSeconds);
    videoElement.play();
    $(".pause").fadeOut();


  });

  var xMax = $("#defile").width();

  var clicked = false;
  $("#defile").on("mousedown", function(e) {
    clicked = true;
  });

  $("body").on("mouseup", function(e) {
    clicked = false;
  });

  $("body").on("mousemove", function(e) {
    
    if (clicked == true) {
      $("#defile").trigger("click");
    }

  });

  var mouseX, mouseY;
  var hideControlsTimeout;
  $(document).mousemove(function(e) {
      mouseX = e.pageX;
      mouseY = e.pageY;
      clearTimeout(hideControlsTimeout);
      fadeInControls();
      hideControlsTimeout = setTimeout(fadeOutControls, 3000);
  });


  $("#defile").on("click", function(e) {

   var parentOffset = $(this).parent().offset(); 
   var xPosition = mouseX - parentOffset.left;

   var numVideo = -1;
   for (var i = 0; i < videos.length; i++) {
    if (xPosition < videos[i].offset().left - parentOffset.left) {
      numVideo = i + 1;
      break;
    }
   }
   if (numVideo == -1) {
    numVideo = videos.length + 1;
   }

   if (numVideo - 2 >= 0) {
    var prevX = videos[numVideo - 2].offset().left - parentOffset.left;
   } else {
    var prevX = 0;
   }

   if (numVideo - 1 >= videos.length) {
    var nextX = xMax;
   } else {
    var nextX = videos[numVideo - 1].offset().left - parentOffset.left;
    
   }

    if ($(e.target).is("h3")) {
        if (numVideo == 1) {
            xPosition = 0;
        }  else {
            // xPosition = videos[numVideo ].offset().left;
            xPosition = videos[numVideo - 2].offset().left;
        }
     
    }

   var posInsideDiv = xPosition - prevX;
   percent = posInsideDiv * 100 / (nextX - prevX);

   console.log("in the video num " + numVideo + " at " + percent + "%");
    playVideo(numVideo);


    var prechargePercent =xPosition * 100 / xMax;
    $("#precharge").width(prechargePercent + "%");

  });

  var videos = [];
  $(".trait").each(function() {
    videos.push($(this));
  });

  $( ".video video" ).on("click", function() {
    var paused = $(this)[0].paused;
    if (paused == false) {
      $(this)[0].pause();
      $(".pause").fadeIn();
    }
    else{
      $(this)[0].play();
      $(".pause").fadeOut();
    }
  });


  var gotoTitle = localStorage.getItem("video-title");

  if (gotoTitle != null) {
    localStorage.removeItem("video-title");
    playVideo(gotoTitle);
  }

});

var fadeOutControls = function() {
  $(".barre-wrap").fadeOut();
  $("body").css("cursor", "none");
};
var fadeInControls = function() {
  $(".barre-wrap").fadeIn(0);
  $("body").css("cursor", "default");
};


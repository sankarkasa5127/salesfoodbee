<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<audio id="myAudio" autoplay loop>
  <source src="https://sale.harjassinfotech.org/public/img/OrderReceivedNotification.mp3" type="audio/mpeg" >
     Your browser does not support the audio element.
</audio>


<button onclick="document.getElementById('myAudio').play()">Play Audio</button>

<!-- <audio id="soundtrack" src="https://sale.harjassinfotech.org/public/img/OrderReceivedNotification.mp3" type="audio/mpeg" loop="loop"></audio> -->

<p>sankar</p>
<button id="btn">btn</button>
<script>
var audio = document.createElement("AUDIO")
document.body.appendChild(audio);
audio.src = "https://sale.harjassinfotech.org/public/img/OrderReceivedNotification.mp3"

//  var audio = document.getElementById("myAudio")

$(document).ready(function(){
  // audio.play();
  // if (confirm("you got order")) {
   //  audio.muted = false; 
   // console.log("--")
   //  audio.play()
    // $("#btn").trigger("click");
  // }
});

document.body.addEventListener("mousemove", function () {
    // audio.play()
})


  $(document).ready(function () {


    Swal.fire({
    title: 'Welcome!',
    text: 'Audio will play shortly...',
    timer: 2000,  // auto close in 2 seconds
    showConfirmButton: false,
    allowOutsideClick: false,
    didOpen: () => {
      // Try to play audio right after alert opens
      const audio = document.getElementById('myAudio');
      audio.play().then(() => {
        console.log('Audio playing...');
      }).catch((err) => {
        console.warn('Audio play blocked:', err);
      });
    }
  });

    /*Swal.fire({
      title: 'Foodbee Order',
      text: "New order received",
      icon: 'success',
      showCancelButton: false,
      confirmButtonText: 'Thank you',
    }).then((result) => {
      if (result.isConfirmed) {
        $('#myAudio')[0].play();
      }
    });*/
  });

// $(document).ready(function(){
//   audio.autoplay = true;
// audio.muted = true; 
//   $("#btn").click();

//   setTimeout(function(){
//     $("#btn").click();

//   },1000);
// });


$("#btn").click(function(){
  audio.muted = false; 
   console.log("--")
    audio.play()
})
</script>

</body>
</html>

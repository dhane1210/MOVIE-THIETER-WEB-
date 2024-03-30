// Video Player
var video = document.getElementById("myVideo");
// Add scroll event listener
window.addEventListener("scroll", function () {
  // Check if the user has scrolled past a certain point
  if (window.scrollY > 200) {
    // Pause the video and set current time to 0
    video.pause();
    video.currentTime = 0;
  } else {
    // Resume the video
    video.play();
  }
});


let next = document.querySelector(".next");
let prev = document.querySelector(".prev");

next.addEventListener("click", function () {
  let items = document.querySelectorAll(".item");
  document.querySelector(".slide").appendChild(items[0]);
});

prev.addEventListener("click", function () {
  let items = document.querySelectorAll(".item");
  document.querySelector(".slide").prepend(items[items.length - 1]);
});
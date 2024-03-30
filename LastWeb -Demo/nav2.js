// Get the navbar element
var navbar = document.querySelector('.navbar');

// Add an event listener for the scroll event
window.addEventListener('scroll', function () {
  // Check if the user has scrolled down more than 50 pixels
  if (window.scrollY > 70) {
    // Add a class to the navbar when scrolled
    navbar.classList.add('scrolled');
  } else {
    // Remove the class when the user scrolls back to the top
    navbar.classList.remove('scrolled');
  }
});
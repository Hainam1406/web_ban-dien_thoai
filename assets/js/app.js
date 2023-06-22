//slide show       
 var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides2(slideIndex += n);
}
function currentSlide(n) {
  showSlides2(slideIndex = n);
}

function showSlides2(n) {
  var i;
  var slides = document.getElementsByClassName("slider-home");
  var dots = document.getElementsByClassName("bx-pager-item");

  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("slider-home");
  var dots = document.getElementsByClassName("bx-pager-item");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 4000);
}      

// -----------------------------------------------------------
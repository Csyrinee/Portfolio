const links = document.querySelectorAll('nav li');

icons.addEventListener("click",()=>{
    //id nav
    nav.classList.toggle("active");
});

links.forEach((link)=>{
    link.addEventListener('click', ()=>{
        nav.classList.remove("active");
    });
});

//ANIMATION ECRITURE

var typed= new Typed(".title_IA", {
    strings:["Intelligence Artificielle..."],
    typeSpeed:100,
    backSpeed:100,
    backDelay:1000,
    loop:true
});

var typed= new Typed(".portfolio", {
    strings:["portfolio"],
    typeSpeed:100,
    backSpeed:100,
    backDelay:1000,
    loop:true
});

//VEILLE

let slideIndex = 1;

function moveSlide(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  const slides = document.getElementsByClassName("slide");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}
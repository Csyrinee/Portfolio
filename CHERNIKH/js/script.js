//ICON BURGER
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

//SLIDE

var swiper = new Swiper(".slide-content", {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
  });

//partie contact

const form = document.querySelector('form');
const nom = document.getElementById("nom");
const prenom = document.getElementById("prenom");
const email = document.getElementById("email");
const objet = document.getElementById("objet");
const message = document.getElementById("message");
function sendEmail(){
    Email.send({
        Host : "smtp.elasticemail.com",
        Username : "csyrinepro@gmail.com",
        Password : "1B96ADF927273BBF0B6A8531DC0AD8A7EE0D        ",
        To : 'csyrinepro@gmail.com',
        From : "csyrinepro@gmail.com",
        Subject : "This is the subject",
        Body : "And this is the body"
    }).then(
      message => alert(message)
    );
}

form.addEventListener("submit",(e) =>{
    e.preventDefault();

    sendEmail()
})


var typed = new Typed(".text", {
  strings: ["Front-End Developer", "Web Designer", "Web Developer"], 
  typeSpeed: 100, 
  backSpeed: 100, 
  backDelay: 1000, 
  loop: true,
});
const header = document.querySelector("header");
window.addEventListener("scroll", function() {
header.classList.toggle("sticky",window.scrollY > 10);
});

let menu = document.querySelector("#menu-icon");
let navlist = document.querySelector(".navlist");

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navlist.classList.toggle('open');
};

window.onscroll= () => {
    menu.classList.remove('bx-x');
    navlist.classList.remove('open');
};

const carousel = document.querySelector('.images_carousel');
const carouselImages = document.querySelectorAll('.images_carousel img');

//Compteur
let counter = 1;
const size = carouselImages[0].clientWidth;

carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';


//Buttons
const prev_Button = document.querySelector('#prev_Button');
const next_Button = document.querySelector('#next_Button');

//Buttons listeners
next_Button.addEventListener('click',()=>{
    if (counter >= carouselImages.length - 1) return;
    carousel.style.transition = "transform 0.5s ease-in-out";
    counter++;
    carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';
});

prev_Button.addEventListener('click',()=>{
    if (counter <= 0) return;
    carousel.style.transition = "transform 0.5s ease-in-out";
    counter--;
    carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';
});
carousel.addEventListener('transitionend', () => {
    if (carouselImages[counter].id === 'lastClone') {
        carousel.style.transition = "none";
        counter = carouselImages.length - 2;
        carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';
    }
    if (carouselImages[counter].id === 'firstClone') {
        carousel.style.transition = "none";
        counter = carouselImages.length - counter;
        carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';
    }
});

setInterval(function(){
    carousel.style.transition = "transform 0.5s ease-in-out";
    counter++;
    carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';
},5000);

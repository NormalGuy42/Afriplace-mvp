const navBtn = document.querySelector('.burger');
navBtn.addEventListener('click',()=>{
    const navMenu = document.querySelector('.sidebar_nav');
    navMenu.classList.toggle('showSideBarNav');
})

document.addEventListener('click',(e)=>{
    if(!e.target.closest('.burger')){
        const navMenu = document.querySelector('.sidebar_nav');
        if(!e.target.closest('.sidebar_nav') && navMenu.classList.contains('showSideBarNav')){
            navMenu.classList.remove('showSideBarNav');
        }
    }
})

//Longpress start
document.addEventListener('DOMContentLoaded', () => {
    addClickTouch();
  });

  let timmy = null;
let timmyLong = null;
const delay = 400; //ms delay to be considered a long press

function addClickTouch() {
clearTimeout(timmy); //stop the longpress delay if it has started

if ('ontouchstart' in document.body) {
    document.querySelectorAll('[data-long]').forEach((btn) => {
    btn.addEventListener('touchstart', start, {
        once: true,
    });
    });
} else {
    document.querySelectorAll('[data-long]').forEach((btn) => {
    btn.addEventListener('mousedown', start, {
        once: true,
    });
    });
}
}

function start(ev) {
//handle the touchstart context menu
ev.preventDefault();

let btn = ev.target.closest('[data-long]');
let bubble_container = this.children[0];
bubble_container.innerHTML = '';

timmy = setTimeout(longPress.bind(btn), delay); // the LONG PRESS

btn.addEventListener('mouseup', addClickTouch);
btn.addEventListener('touchcancel', addClickTouch);
}

function longPress() {
let btn = this;
btn.removeEventListener('mouseup', addClickTouch);
btn.removeEventListener('touchcancel', addClickTouch);

//remove all the flyout buttons after delay if no interaction for 3 seconds
timmyLong = setTimeout(resetButtons.bind(btn), 2500);

let template =`

`
btn.children[0].innerHTML = template;
}

function resetButtons() {
let bubble_container = this.children[0];
bubble_container.innerHTML = '';
addClickTouch();
}
//Longpress end
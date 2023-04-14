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
<div class="bubble">
    <div class="bubble_icon">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="change">
    <path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 
    19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 
    489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 
    220.3 291.7 90.3z"/>
    </svg>
    </div>
    <div class="bubble_icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="hide">
            <path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 
            25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 
            79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 
            68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 
            149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 
            48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 
            4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 
            13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 
            10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 
            220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 
            239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/>
        </svg>
    </div>
    <div class="bubble_icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="delete">
            <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 
            32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 
            0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 
            45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
        </svg>
    </div>
</div>`
btn.children[0].innerHTML = template;
}

function resetButtons() {
let bubble_container = this.children[0];
bubble_container.innerHTML = '';
addClickTouch();
}
//Longpress end
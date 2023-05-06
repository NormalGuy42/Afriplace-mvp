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
    //Popup
    var popup = document.querySelector('.popup');
    var body = document.querySelector('body');
    if(e.target.closest('.cancel') || e.target.closest('.screen_overlay')){
        if(!e.target.closest('.text_container') && !e.target.closest('.deleteButton')){
            body.removeChild(popup);
        }
    }
})


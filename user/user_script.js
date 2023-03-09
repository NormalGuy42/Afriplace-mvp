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
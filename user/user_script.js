const navBtn = document.querySelector('.burger');
navBtn.addEventListener('click',()=>{
    const navMenu = document.querySelector('.sidebar_nav');
    navMenu.classList.toggle('showSideBarNav');
})
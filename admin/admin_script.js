//Toggle menu start
document.addEventListener('click',(e)=>{
    var sidebar = document.querySelector(".admin_nav");
    if(e.target.closest('.burger')){
        sidebar.classList.toggle('showNav');
    }
    if(!e.target.closest('.burger') && sidebar.classList.contains('showNav')){
        if(!e.target.closest(".admin_nav")){
            sidebar.classList.remove('showNav');
        }
    }
})

//Toggle menu end

//Properties start
var buttons = document.querySelectorAll('.more_actions');
//Open Menu onclick
buttons.forEach(button =>{
    button.addEventListener("click",()=>{
        const menu = button.nextElementSibling;
        const activeMenu = document.querySelectorAll('[data-active="true"]');
        //Make button active on click
        if(!menu.dataset.active ){
            menu.dataset.active = true;
            menu.classList.add('show')
        }
        else if(menu.dataset.active = true){
            delete menu.dataset.active;
            if(menu.classList.contains('show')){
                menu.classList.remove('show');
            }
        }
        //Make previous button inactive
        if(activeMenu != null){
            if(activeMenu.length = 1 ){
                try{
                    activeMenu[0].classList.remove('show');
                    delete activeMenu[0].dataset.active
                }catch(e){}
            };
        }
    })
})
//Hide Menu when click outside
document.addEventListener('click',function(e){
    var menus = document.querySelectorAll('.btn_section');
    menus.forEach(menu =>{
        if(!e.target.closest('button') && menu.classList.contains('show')){ 
            menu.classList.remove('show');
            if(menu.dataset.active){
                delete menu.dataset.active
            }
          }
    }) 
}
)
//Properties end


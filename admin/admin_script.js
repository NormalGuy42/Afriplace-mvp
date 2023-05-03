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
//Collapse property list
var boxes = document.querySelectorAll('.box');
        boxes.forEach(box=>{
            box.addEventListener('click',()=>{
                var info = box.nextElementSibling;
                var activeSection = document.querySelectorAll('section[data-active="true"]');
                if(!info.dataset.active){
                    info.dataset.active = true;
                }else if(info.dataset.active = true){
                    delete info.dataset.active;
                }
                try{
                    if(activeSection.length = 1){
                    delete activeSection[0].dataset.active;
                    }
                }catch(e){}
            })
        })
        /*Click outside and container closes*/
        document.addEventListener('click',(e)=>{
            var activeSection = document.querySelector('section[data-active="true"]');
            try{
                if(!e.target.closest('.container') && activeSection.dataset.active){
                    delete activeSection.dataset.active;
                }
            }catch(e){}
        })
        
//Properties end
var filterBtn = document.querySelector('.filterBtn');
filterBtn.addEventListener('click',()=>{
    var section = filterBtn.nextElementSibling;
    section.classList.toggle('showFilterSection');

    document.addEventListener('click',(e)=>{
        if(!e.target.closest('.filterBtn')){
            if(!e.target.closest('.filterSection') && section.classList.contains('showFilterSection')){
                section.classList.remove('showFilterSection');
            }
        }
    })
})

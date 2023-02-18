//Properties start
var buttons = document.querySelectorAll('.more_actions');
//Open Menu onclick
buttons.forEach(button =>{
    button.addEventListener("click",()=>{
        const menu = button.nextElementSibling;
        const activeMenu = document.querySelector('[data-active]');
        menu.classList.toggle('show');
        
        // if(!menu.dataset.active){
        //     menu.dataset.active = true;
        //     // menu.classList.add('show');
        // }
        // else if(menu.dataset.active = true){
        //     delete menu.dataset.active;
        //     // menu.classList.remove('show');
        // }
        // if(menu.dataset.active = true){menu.classList.add('show');}
        // else if(menu.dataset.active && menu.classList.contains('show')){
        //     menu.classList.remove('show');
        // }
    })
})
//Hide Menu when click outside
document.addEventListener('click',function(e){
    var menus = document.querySelectorAll('.btn_section');
    menus.forEach(menu =>{
        if(!e.target.closest('button') && menu.classList.contains('show')){ 
            menu.classList.remove('show');
          }
    }) 
}
)

//Properties end

//Create Listing start
//Couldn't find a way for both of them to work at the same time
//Fix this
function bedCounter(){
    const bedButtons = document.querySelectorAll("[data-bed-btn]");
    const spanBed = document.getElementById('num_lits');
    let num = 0;
    bedButtons.forEach(button =>{
    button.addEventListener("click",()=>{
        var value = button.dataset.bedBtn;
        if(value==="increment"){num++}
        else{num--}
        if(num<0){num = 0}
        spanBed.innerText = num;
        })
    })
}
function bathCounter(){
    const bedButtons = document.querySelectorAll("[data-bath-btn]");
    const spanBed = document.getElementById('num_toilettes');
    let num = 0;
    bedButtons.forEach(button =>{
    button.addEventListener("click",()=>{
        var value = button.dataset.bathBtn;
        if(value==="increment"){num++}
        else{num--}
        if(num<0){num = 0}
        spanBed.innerText = num;
        })
    })
}
bedCounter();
bathCounter();
//Create Listing end
//Index script start
//Show navigation menu
//Index script end

//Searchpage script start
//toggle tabs start
function toggleHome() {
  document.getElementById("home_section").classList.toggle("show");
}
function toggleAction() {
  document.getElementById("action_section").classList.toggle("show");
}
function togglePrice() {
  document.getElementById("price_section").classList.toggle("show");
}
function toggleFilter() {
  document.getElementById("filter_section").classList.toggle("show");
}
//toggle tabs end

function activateButton(){
  const rooms = document.querySelectorAll('.room_row');
  rooms.forEach(room =>{
    room.closest('button').addEventListener('click',()=>{
      const buttons = document.querySelectorAll('button')
      buttons.forEach(button =>{
        button.addEventListener('click',()=>{
            button.dataset.active = true
        })
      })
    })
  })
}
activateButton();
// document.addEventListener('click',function(e){
//   var dialog = document.getElementById('home_section');
//   if(e.target.closest("#home_section")){
//     console.log('Clicked inside')
//   }else{
//     console.log('Clicked outside');
//     console.log(dialog.style.display);
//   }
// })
//Searchpage script end

//View property start
//Image slider code code
const buttons = document.querySelectorAll("[data-slide-btn]");
//Image counter handler
const currentImg = document.querySelector('#current_img');
const totalImg = document.querySelector('#total_img');
const images = document.querySelector("[data-slides]")
totalImg.innerText = images.children.length;

buttons.forEach(button =>{
  button.addEventListener("click",()=>{
    //Find which button was pressed and retrieve data from the slide container
    const offset = button.dataset.slideBtn === "next" ?1:-1
    const slides = button.closest("[data-slide-container]").querySelector("[data-slides]")
    const activeSlide = slides.querySelector("[data-active]")
    //Index
    let newIndex = [...slides.children].indexOf(activeSlide) + offset
    if(newIndex < 0) newIndex = slides.children.length -1
    if(newIndex >= slides.children.length) newIndex = 0
    //Make changes
    slides.children[newIndex].dataset.active = true
    currentImg.innerText = newIndex+1
    delete activeSlide.dataset.active
  })
})
//View property end

//Index script start
//Show navigation menu
//Index script end

//Searchpage script start
//toggle tabs start
//Fix this
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

// function activateButton(){
//   const rooms = document.querySelectorAll('.room_row');
//   rooms.forEach(room =>{
//     room.closest('button').addEventListener('click',()=>{
//       const buttons = document.querySelectorAll('button')
//       buttons.forEach(button =>{
//         button.addEventListener('click',()=>{
//             button.dataset.active = true
//         })
//       })
//     })
//   })
// }
// activateButton();

//When user clicks outside menu closes
//Fix this it's not good
document.addEventListener('click',function(e){
  var dialogHome = document.getElementById('home_section');
  var dialogAction = document.getElementById('action_section');
  var dialogPrice = document.getElementById('price_section')
  var dialogFilter = document.getElementById('filter_section')
  if(!e.target.closest('#home_type') && dialogHome.classList.contains('show') ){ 
    dialogHome.classList.remove('show');
  }
  else if(!e.target.closest('#action_type') && dialogAction.classList.contains('show')){
    dialogAction.classList.remove('show');
  }
  else if(!e.target.closest('#prix') && dialogPrice.classList.contains('show')){
    dialogPrice.classList.remove('show');
  }
  else if(!e.target.closest('#filter') && dialogFilter.classList.contains('show')){
    dialogFilter.classList.remove('show');
  }  
})
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

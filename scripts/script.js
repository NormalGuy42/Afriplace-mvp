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


// document.addEventListener('click',function(e){
//   var dialog = document.getElementById('home_section');
//   if(e.target.closest("#home_section")){
//     console.log('Clicked inside')
//   }else{
//     console.log('Clicked outside');
//     console.log(dialog.style.display);
//   }
// })

var dialog = document.querySelector('#results_title');

//All the input sections
var homeInput = document.querySelector('#homeInput');
var actionInput = document.querySelector('#actionInput');
var priceInput = document.querySelector('#priceInput');
//filter
var filterInput = document.getElementById('filter_input');
var filterSection = document.getElementById('filter_section');

//Creating an adding Price section
function addSection(input,text){
  //Create div and label section
  const div = document.createElement('div');
  const label = document.createElement('label')
  //Configure div and label
  label.innerText = text
  div.classList.add('option');
  div.appendChild(label)
  //Append elements to filter section
  div.innerHTML += input.innerHTML;
  filterInput.prepend(div);
}
const action = document.querySelector('#price_section');

// addSection(priceInput,'Prix');
// addSection(actionInput,"Type d'action");
// addSection(homeInput,"Type d'habitat");





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

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

// window.onclick = function(event) {
//   var dialog = document.querySelector('.dialog home_type');
//   if (!event.target.matches(dialog)){
//     console.log('Clicked Inside');
//   }else{
//     console.log('Clicked Outside');
//   }
// }
;
document.addEventListener('click',function(e){
  var dialog = document.getElementById('home_section');
  if(e.target.closest("#home_section")){
    console.log('Clicked inside')
  }else{
    console.log('Clicked outside');
    console.log(dialog.style.display);
  }
})

var dialog = document.querySelector('#results_title');

//All the input sections
var homeInput = document.querySelector('#homeInput');
var actionInput = document.querySelector('#actionInput');
var priceInput = document.querySelector('#priceInput');
//filter
var filterInput = document.getElementById('filter_input');
var filterSection = document.getElementById('filter_section');

//Creating an adding Price section
function addPriceSection(input,text){
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
function add(){
  const div = document.createElement('div');
  const label = document.createElement('label')
  //Configure div and label
  label.innerText = 'Maison'
  div.classList.add('option');
  div.appendChild(label)
  //Append elements to filter section
  div.innerHTML += homeInput.innerHTML;
  filterInput.prepend(div);
}



// filter.innerHTML += priceSection.innerHTML;
// if(priceBtn.style.display == 'none' ){
//   filter.innerHTML += priceBtn.innerHTML;
//   console.log('price was added')
// }else if(actionBtn.style.display == 'none'){
//   filter.innerHTML += actionBtn.innerHTML;
//   console.log('action was added')
// }else if(homeBtn.style.display == 'none'){
//   filter.innerHTML += homeBtn.innerHTML;
//   console.log('home was added')
// }

//Viewproperty code
const buttons = document.querySelectorAll("[data-slide-btn]");
buttons.forEach(button =>{
  button.addEventListener("click",()=>{
    const offset = button.dataset.slideBtn === "next" ?1:-1
    const slides = button.closest("[data-slide-container]").querySelector("[data-slides]")
    const activeSlide = slides.querySelector("[data-active]")

    let newIndex = [...slides.children].indexOf(activeSlide) + offset
    if(newIndex < 0) newIndex = slides.children.length -1
    if(newIndex >= slides.children.length) newIndex = 0
    
    slides.children[newIndex].dataset.active = true
    delete activeSlide.dataset.active
  })
})


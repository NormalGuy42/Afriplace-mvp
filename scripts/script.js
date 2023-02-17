//Index script start
var nav_list = document.querySelector('.nav_ul');
document.addEventListener('click',function(e){
  var burgerElements = document.querySelectorAll('.burger');
  burgerElements.forEach(burgerElement =>{
      if(!e.target.closest('.burger') && !nav_list.classList.contains('hide')){
        nav_list.classList.add('hide');
      }
      if(e.target.closest('.burger') && nav_list.classList.contains('hide')){
        nav_list.classList.remove('hide');
      }
  })
})
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

//Filter Button start
//Acivate room filter button on click start
//Bedroom
function activateBedButton(){
  const rooms = document.querySelector('.room_row');
  const roomBtn = rooms.querySelectorAll('button');
  roomBtn.forEach(button =>{
    button.addEventListener('click',()=>{
      if(!button.dataset.active){
       button.dataset.active = true;
      }
      else if(button.dataset.active = true){
        delete button.dataset.active;
      }
    })
  })
}
//Bathroom
function activateBathButton(){
  const rooms = document.querySelector('#tlts_selector');
  const roomBtn = rooms.querySelectorAll('button');
  roomBtn.forEach(button =>{
    button.addEventListener('click',()=>{
      if(!button.dataset.active){
       button.dataset.active = true;
      }
      else if(button.dataset.active = true){
        delete button.dataset.active;
      }
    })
  })
}
activateBedButton();
activateBathButton();
//Acivate room filter button on click end
//Filter Button end

//When user clicks outside menu closes
//Fix this it's not good
document.addEventListener('click',function(e){
  var nav_list = document.querySelector('.nav_ul');
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


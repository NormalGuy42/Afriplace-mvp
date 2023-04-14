//Index script start
var nav_list = document.querySelector('.nav_ul');
document.addEventListener('click',function(e){
  
  try{
    if(e.target.closest('.burger')){
      nav_list.classList.toggle('showNav');
    }
    if(!e.target.closest('.burger') && nav_list.classList.contains('showNav')){
      if(!e.target.closest(".nav_ul")){
        nav_list.classList.remove('showNav');
      }
    }
  }catch(e){}
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
//Searchpage script end


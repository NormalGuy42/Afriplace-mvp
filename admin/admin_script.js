//Properties start
function toggleSection(){
    document.querySelector('.btn_section').classList.toggle("show");
    console.log(document.querySelectorAll('.btn_section'));
}
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

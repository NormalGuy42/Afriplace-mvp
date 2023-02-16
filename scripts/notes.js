'SearchPage templates start'
'This is for changing the inputs inside the Filter Button'
/*function handleFilterInputs(){
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
    window.addEventListener('resize',()=>{
      var windowWidth = window.innerWidth;
      if(windowWidth >=755 ){  addSection(priceInput,'Prix');}
      else if(windowWidth>=655){addSection(actionInput,"Type d'action")}
      else if(windowWidth>=555){addSection(homeInput,"Type de bien")}
    })
  }
  handleFilterInputs();*/

'SearchPage templates end'
<?php include('../config/connection.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Property</title>
    <link rel="stylesheet" href=" ../css/style.css">
    <link rel="stylesheet" href="userpage.css">
    <script src="user_script.js" defer></script>
    
</head>
<body>
    <!--Header-->
    <?php include('../templates/user_header.php')?>
    <!--Header-->
        <div class="create_listing">
            <!--Send images start-->
            <div class="image_send">
               <div class="images">
                   <ul>
                       <li></li>
                   </ul>
               </div>
               <button>Upload</button>
           </div>
           <!--Send images end-->
           <!--Form start-->
           <form>
               <div class="inputs">
                   <div class="container input">
                       <label>Titre</label>
                       <input class="titre" placeholder="Titre de l'annonce">
                   </div>
                   <div class="container input">
                       <label>Prix</label>
                       <input class="prix" placeholder="Prix du bien">
                   </div>
                   
                   <div class="container input">
                       <label>Type de bien</label>
                       <select>
                           <option>Maison</option>
                           <option>Appart</option>
                           <option>Terrain</option>
                           <option>Bureaux</option>
                       </select>
                   </div>
                   <div class="container input">
                       <label>Statut du bien</label>
                       <select>
                           <option>A acheter</option>
                           <option>A louer</option>
                       </select>
                   </div>
                   <div class="container input">
                       <label>Quartier</label>
                       <input placeholder="Entre le quartier">
                   </div>
                   <div class="container input">
                       <label>Localisation</label>
                       <input placeholder="Coordonnées google maps">
                   </div>
               </div>
               <div class="btn_input">
                   <div class="container">
                       <label>Nombre de chambres</label>
                       <div class="custom_btn" id="bed_num">
                           <!-- <input placeholder="Nombre de lits"> -->
                           <button data-bed-btn="decrement" type="button">-</button>
                           <span id="num_lits">0</span>
                           <button data-bed-btn="increment" type="button">+</button>
                       </div>
                   </div>
                   <div class="container">
                       <label>Nombre de toilettes</label>
                       <div class="custom_btn" id="bath_num">
                           <!-- <input placeholder="Nombre de toilettes"> -->
                           <button data-bath-btn="decrement" type="button">-</button>
                           <span id="num_toilettes">0</span>
                           <button data-bath-btn="increment" type="button">+</button>
                       </div>
                   </div>
               </div>
               <div class="surface">
                   <div class="container surface">
                       <label>Surface</label>
                       <input placeholder="Entre la surface">
                   </div>
               </div>
               <div class="container">
                   <h4>Description</h4>
                   <textarea></textarea>
               </div>
               <div class="container">
                   <h4>Installations</h4>
                   <ul>
                       <li><input type="checkbox">Meublé</li>
                       <li><input type="checkbox">Non-Meublé</li>
                       <li><input type="checkbox">Climatisation</li>
                       <li><input type="checkbox">Gardiens</li>
                       <li><input type="checkbox">Machine à laver</li>
                       <li><input type="checkbox">Piscine</li>
                       <li><input type="checkbox">Parking</li>
                       <li><input type="checkbox">Groupe Electrogène</li>
                   </ul>
               </div>
               <div class="btn_container">
                   <button class="finish_btn">Terminer</button>
               </div>
           </form>
           <!--Form end-->
       </div>  
    <!--End of userpage-->
    </div>
    <script defer>
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
    </script>
</body>
</html>
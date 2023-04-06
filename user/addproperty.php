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
    <style>
        /*Create Listing start*/
        .main_body{
            display: inline;
            margin: 0 auto;
            width: 40%;
            margin-bottom: 30px;
        }
        /*Images upload start*/
        .main_body .image_send{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .main_body img{
            width: 100%;
            height: 300px;
            margin-top: 20px;
        }
        .main_body .image_send button{
            background-color: rgb(72, 72, 248);
            color: white;
            border: 1px solid;
            padding: 5px;
            font-size: 17px;
        }
        .image_send{
            margin: 20px 0;
        }
        .image_send .images{
            background: url(../assets/picture\ icon.png) no-repeat;
            background-size: 200px;
            background-color: #d2d2db;
            background-position: center;
            margin-bottom: 10px;
        }
        .images{
            height: 350px;
            width: 100%;
        }
        /*Images upload end*/
        .main_body .container{
            margin-top: 10px;
        }
        .custom_btn{
            display: inline;
        }
        .main_body h4{
            margin: 0;
            margin-bottom: 10px;
            font-size: 18px;
        }
        /*Input start*/
        .inputs{
            display: table;
            margin: 10px 0px;
            width: 100%;
        }
        .inputs .container.input{
            display: table-row;
        }
        .inputs .container.input label{
            display: table-cell;
            padding-bottom: 20px;
            width: 30%;
        }
        .inputs .container.input input{
            width: 100%;
            /* padding: 1px 2px; */
            padding: 15px 0px 15px 20px;
            font-size: 15px;
        }
        .inputs .container.input select{
            width: 100%;
            padding: 0 15px;
            font-size: 15px;
        }
        .container button{
            padding: 1px 6px;
        }
        .surface{
            display: table;
            width: 100%;
        }
        .container.surface{
            display: table-row;
        }
        .container.surface label{
            display: table-cell;
            width: 30%;
        }
        .container.surface input{
            width: 100%;
            height: 25px;
            border: 1px solid;
            /* padding: 1px 2px; */
            padding: 15px 0px 15px 20px;
            font-size: 15px;
        }
        /*Input end*/
        .container.input{
            display: flex;
            justify-content: space-between;
        }
        .container label{
            font-size: 18px;
        }
        .container.input input{
            width: 80%;
            max-width: 450px;
            height: 28px;
            border: 1px solid black;
            border-radius: 2px;
        }
        .container.input select{
            width: 81%;
            max-width:  450px;
            height: 30px;
            border: 1px solid black;
        }
        /*Button container start*/
        .btn_input{
            display: table;
            margin-bottom: 10px;
        }
        .btn_input .container{
            display: table-row;
        }
        .btn_input .container label{
            display: table-cell;
            padding-right: 20px;
            padding-bottom: 8px ;
        }
        .btn_input input{
            width: 80%;
            height:25px;
            border:1px solid;
        }
        /*Button container end*/
        .container textarea{
            width: 100%;
            height: 150px;
            border: 1px solid;
            font-family: Arial, Helvetica, sans-serif;
        }
        .container ul{
            list-style-type: none;
            column-count: 2;
            padding: 0;
            margin: 0;
        }
        .container ul li{
            font-size: 18px;
        }
        .container ul li input{
            margin-right: 5px;
        }
        .btn_container{
            margin: 30px 0;
            width: 100%;
            display: flex;
            justify-content: center;
        }
        .finish_btn{
            background-color: orange;
            color: white;
            font-size: 20px;
            border: 1px solid;
            border-radius: 2px;
            padding: 5px;
        }
        @media (max-width:1030px) {
            .main_body{
                width: 70%;
            }
        }
        @media (max-width:600px) {
            .main_body{
                width: 85%;
            }
            .image_send .images{
                height: 250px;
            }
        }
        @media (max-width:440px) {
            .container label{
                font-size: 16px;
            }
        }
        /*Create Listing end*/
    </style>
</head>
<body>
    <!--Header-->
    <?php include('../templates/user_header.php')?>
    <!--Header-->
        <div class="main_body">
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
           <form class="create_listing">
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
                       <input placeholder="Lien google maps">
                   </div>
               </div>
               <div class="btn_input">
                   <div class="container">
                       <label>Nombre de lits</label>
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
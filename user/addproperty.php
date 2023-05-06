<?php 
    include('../config/connection.php');
    include('../templates/get_user_id.php');
    //Form authentitcation start
    $errors = ['title'=>'','price'=>'','type'=>'','statut'=>'','quartier'=>'','localisation' =>'','surface' =>'','description' =>'','quirks'=>'','img'=>''];
    $title = $price = $type = $statut = $quartier = $localisation = $surface = $bedNum = $toiletteNum = $description = $quirks = $images =  '';

    $GLOBALS['imageSources'] = '';
    $GLOBALS['quirks'] = '';
    
    if(isset($_POST['submit'])){

        //Check title
        if(empty($_POST['title'])){
            $errors['title'] = 'Vous devez entrer un titre';
        }else{
            $title = $_POST['title'];
        }

        //Check price
        if(empty($_POST['price'])){
            $errors['price'] = 'Vous devez entrer un prix';
        }else{
            $price = $_POST['price'];
        }

        //Check type
        $type = $_POST['type'];
        if($type == "Choisir le type"){
            $errors['type'] = 'Vous devez choisir un type de bien';
        }else{
            $type = $_POST['type'];
        }

        //Check Status
        $statut = $_POST['statut'];
        if($statut == "Choisir le statut"){
            $errors['statut'] = 'Vous devez choisir un statut pour votre bien';
        }else{
            $statut = $_POST['statut'];
        }

        //Check quartier
        if(empty($_POST['quartier'])){
            $errors['quartier'] = 'Vous devez choisir un quartier';
        }else{
            $quartier = $_POST['quartier'];
            $quartierQuery = "SELECT `communes rurales` FROM places WHERE `communes rurales` = '$quartier'";
            $quartierResult = mysqli_query($db,$quartierQuery);
            if(mysqli_num_rows($quartierResult) >1){
                $errors['quartier'] ='Ce quartier n\'est pas dans notre base de donnée';
            }
        }
        //Check Localisation
        if(empty($_POST['localisation'])){
            $errors['localisation'] = 'Vous devez entrer une localisation';
        }else{
            $localisation = $_POST['localisation'];
        }
        //Check surface
        if(empty($_POST['surface'])){
            $errors['surface'] = 'Vous devez entrer une surface pour votre bien';
        }else{
            $surface = $_POST['surface'];
        }
        //Check description
        if(empty($_POST['description'])){
            $errors['description'] = 'Vous devez choisir une description pour votre bien';
        }else{
            $description = $_POST['description'];
        }
        //Format quirks
        if(!empty($_POST['quirks'])){
            if(array_filter($_POST['quirks'])){
                for($i= 0;$i< count($_POST['quirks']);$i++){
                    $GLOBALS['quirks'] .= $_POST['quirks'][$i].',';
                }
            }
        }
        //Image Upload start
        $images = array_filter($_FILES['image']['name']);
        if(!empty($images)){
            try{
                foreach($_FILES['image']['name'] as $key=>$val){
                    //Extract variables
                    $imageName = $_FILES['image']['name'][$key];
                    $imageSize = $_FILES['image']['size'][$key];
                    $imageTempName = $_FILES['image']['tmp_name'][$key];
                    $imageType = $_FILES['image']['type'][$key];
                    $imageError = $_FILES['image']['error'][$key];
                
                    $imageExtension = explode('.',$imageName);
                    $imageActualExt = strtolower(end($imageExtension));
        
                    $allowed = array('jpg','jpeg','png','webp','pdf','gif');
                    //Check if image is allowed and that are no errord
                    if(in_array($imageActualExt,$allowed)){
                        if($imageError === 0){
                            if($imageSize < 5000000){
                                if(!array_filter($errors)){
                                    //Create unique names for images
                                    $imageNewName = uniqid('',true).".".$imageActualExt;
                                    $imageDestination = '../uploads/properties/'.$imageNewName;
                                    //Put images in list
                                    $GLOBALS['imageSources'].= str_replace('../','',$imageDestination).',';
                                    move_uploaded_file($imageTempName,$imageDestination);
                                }
                            }else{
                                $errors['img'] = "Cette image est trop grande!";
                            }
                        }else{
                            $errors['img'] = "Une erreur a été produite lors du téléchargement";
                        }
                    }else{
                        $errors['img'] = "Ce fichier n'a pas une extension accepté";
                    }
                }
            }catch(e){}
        }else{
            $errors['img'] = "Vous devez choisir des images";
        }
        //Image Upload end
        //Save data to database start
        if(!array_filter($errors)){
            //format information start
            $priceString = str_replace('.','',$_POST['price']);
            $surfaceString = str_replace('.','',$_POST['surface']);
            //format information end

            //Get location information from quartier end
            $sql = "SELECT * FROM places WHERE `communes rurales`='$quartier'";
            $placeInfo = mysqli_fetch_assoc(mysqli_query($db,$sql));
            //Get location information from quartier start

            //Information to insert start
            $images = mysqli_real_escape_string($db,$GLOBALS['imageSources']);
            $price = mysqli_real_escape_string($db,intval($priceString));
            $title = mysqli_real_escape_string($db,$_POST['title']);
            $type = mysqli_real_escape_string($db,$_POST['type']);
            $statut = mysqli_real_escape_string($db,$_POST['statut']);
            $bedNum = mysqli_real_escape_string($db,intval($_POST['bedNum']));
            $toiletteNum = mysqli_real_escape_string($db,intval($_POST['toiletteNum']));
            $surface = mysqli_real_escape_string($db,intval($surfaceString));
            $localisation = mysqli_real_escape_string($db,$_POST['localisation']);
            $quartier = mysqli_real_escape_string($db,$_POST['quartier']);
            $description = mysqli_real_escape_string($db,$_POST['description']);
            $quirks = mysqli_real_escape_string($db,$GLOBALS['quirks']);
            //user ID
            $userID = mysqli_real_escape_string($db,$id);
            //Place info
            $district = mysqli_real_escape_string($db,$placeInfo['communes urbaines']);
            $prefecture = mysqli_real_escape_string($db,$placeInfo['prefectures']);
            $region = mysqli_real_escape_string($db,$placeInfo['regions']);
            $country =  mysqli_real_escape_string($db,$placeInfo['pays']);
            
            //Information to insert end
            $sql = "INSERT INTO properties(`title`, `price`,`type`, `action`, `bedNum`,
            `toiletteNum`, `surface`, `description`, `quirks`, 
            `images`, `localisation`, `userID`,`quartier`,`communes urbaines`, `prefectures`, `regions`, `pays`) 
            VALUES('$title',$price,'$type','$statut',$bedNum,$toiletteNum,$surface,
            '$description','$quirks','$images','$localisation',$userID,'$quartier','$district','$prefecture','$region','$country')";
            if(mysqli_query($db,$sql)){
                header('Location: userpage.php');
            }
            else{
                echo "<div class='errorBox'>Erreur de connexion</div>";
            }
        }
        //Save data to database end
    }
    //Form authentitcation end
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un bien</title>
    <link rel="stylesheet" href=" ../css/style.css">
    <link rel="stylesheet" href="userpage.css">
    <script src="user_script.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
        #house_stats{
            display: none;
        }
        .showSection{
            display: table !important;
        }
        .error{
            color: red;
            width: 100%;
            display: table-row;
            text-align: center;
        }
        input[type="file"]{
            display: none;
        }
        label span{
            color: red;
        }
        h4 span{
            color: red;
        }
        .quartierList{
            position: relative;
        }
        .quartierContainer{
            position: absolute;
            width: 100%;     
        }
        .quartierContainer div{
            padding: 15px;
            background-color: white;
            border: 1px solid #bfbaba;
            border-top: 1px solid transparent;
            width: 100%;
            color: #706f6f;
        }
        .quartierOption{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!--Header-->
    <?php include('../templates/user_header.php')?>
    <!--Header-->
        <form class="create_listing" enctype="multipart/form-data" method="POST">
            <!--Send images start-->
            <div class="image_send">
               <div class="images">
                   
               </div>
               <input type="file" multiple accept="image/*" id="upload" name="image[]">
               <label for="upload">
                    <div class="upload_btn">
                        Choisir des images
                    </div>
               </label>
           </div>
           <div class="error"><?php echo htmlspecialchars($errors['img'])?></div>
           <!--Send images end-->
           <!--Form start-->
        
               <div class="inputs">
                   <div class="container input">
                       <label>Titre<span> *</span></label>
                       <input class="titre" placeholder="Titre de l'annonce" name="title" value="<?php echo htmlspecialchars($title)?>">
                   </div>
                </div>
                <div class="error"><?php echo htmlspecialchars($errors['title'])?></div>
                <div class="inputs">
                   <div class="container input">
                       <label>Prix<span> *</span></label>
                       <input class="prix" placeholder="Prix du bien" data-input="true" name="price" value="<?php echo htmlspecialchars($price)?>">
                   </div>
                </div class="inputs">
                <div class="error"><?php echo htmlspecialchars($errors['price'])?></div>
                <div class="inputs">
                <div class="container input">
                       <label>Type de bien <span> *</span></label>
                       <select id="type" name="type" value="<?php echo htmlspecialchars($type)?>">
                           <option>Choisir le type</option>
                           <option <?php if($type=="Maison"){echo 'selected';}?>>Maison</option>
                           <option <?php if($type=="Appart"){echo 'selected';}?>>Appart</option>
                           <option <?php if($type=="Terrain"){echo 'selected';}?>>Terrain</option>
                           <option <?php if($type=="Bureaux"){echo 'selected';}?>>Bureaux</option>
                       </select>
                   </div>
                </div>
                <div class="error"><?php echo htmlspecialchars($errors['type'])?></div>
                <div class="inputs">
                <div class="container input">
                    <label>Statut du bien<span> *</span></label>
                    <select name="statut" value="<?php echo htmlspecialchars($statut)?>">
                        <option>Choisir le statut</option>
                        <option value="buy" <?php if($statut=="buy"){echo 'selected';}?>>A acheter</option>
                        <option value="rent" <?php if($statut=="rent"){echo 'selected';}?>>A louer</option>
                    </select>
                </div>
               </div>
               <div class="error"><?php echo htmlspecialchars($errors['statut'])?></div>
               <div class="inputs">
                    <div class="container input">
                        <label>Quartier<span> *</span></label>
                        <input placeholder="Entre le quartier" id="quartier" name="quartier" value="<?php echo htmlspecialchars($quartier)?>" autocomplete="off">
                        <div class="quartierList">
                            <div class="quartierContainer">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="error"><?php echo htmlspecialchars($errors['quartier'])?></div>
                <div class="inputs">
                    <div class="container input">
                        <label>Localisation<span> *</span></label>
                        <input placeholder="Coordonnées google maps" name="localisation" value="<?php echo htmlspecialchars($localisation)?>">
                    </div>
                </div>
                <div class="error"><?php echo htmlspecialchars($errors['localisation'])?></div>
               <div class="btn_input <?php if($type == "Maison"|| $type=="Appart"){echo 'showSection';}?>" id="house_stats">
                        <div class="container">
                            <label>Nombre de chambres</label>
                            <div class="custom_btn" id="bed_num">
                                <!-- <input placeholder="Nombre de lits"> -->
                                <button data-bed-btn="decrement" type="button">-</button>
                                <span id="num_lits">0</span>
                                <button data-bed-btn="increment" type="button">+</button>
                                <input type="hidden" name="bedNum" id="bedInput" value="<?php echo htmlspecialchars($bedNum)?>">
                            </div>
                        </div>
                        <div class="container">
                            <label>Nombre de toilettes</label>
                            <div class="custom_btn" id="bath_num">
                                <!-- <input placeholder="Nombre de toilettes"> -->
                                <button data-bath-btn="decrement" type="button">-</button>
                                <span id="num_toilettes">0</span>
                                <button data-bath-btn="increment" type="button">+</button>
                                <input type="hidden" name="toiletteNum" id="toiletteInput" value="<?php echo htmlspecialchars($toiletteNum)?>">
                            </div>
                        </div>
                    </div>
               <div class="surface">
                   <div class="container surface">
                       <label>Surface<span> *</span></label>
                       <input placeholder="Entre la surface" data-input="true" name="surface" value="<?php echo htmlspecialchars($surface)?>">
                   </div>
               </div>
               <div class="error"><?php echo htmlspecialchars($errors['surface'])?></div>
               <div class="container">
                   <h4>Description<span> *</span></h4>
                   <textarea name="description"><?php echo htmlspecialchars($description)?></textarea>
                   <div class="error"><?php echo htmlspecialchars($errors['description'])?></div>

               </div>
               <div class="container">
                   <h4>Installations</h4>
                   <ul>
                       <li><input type="checkbox" name="quirks[]" 
                            value="Meublé" <?php if(!empty($_POST['quirks'])){if(in_array('Meublé',$_POST['quirks'])){echo 'checked';}}?>>
                            Meublé
                        </li>
                       <li><input type="checkbox" name="quirks[]" 
                            value="Non-meublé" <?php if(!empty($_POST['quirks'])){if(in_array('Non-meublé',$_POST['quirks'])){echo 'checked';}}?>
                            >Non-Meublé
                      </li>
                      <li><input type="checkbox" name="quirks[]" 
                            value="Climatisation"<?php if(!empty($_POST['quirks'])) if(in_array('Climatisation',$_POST['quirks'])){echo 'checked';}?>>
                            Climatisation
                        </li>
                       <li><input type="checkbox" name="quirks[]" 
                            value="Gardiens" <?php if(!empty($_POST['quirks'])){if(in_array('Gardiens',$_POST['quirks'])){echo 'checked';}}?>>
                            Gardiens
                        </li>
                       <li><input type="checkbox" name="quirks[]" 
                            value="Machine à laver"<?php if(!empty($_POST['quirks'])){if(in_array('Machine à laver',$_POST['quirks'])){echo 'checked';}}?>>
                            Machine à laver
                        </li>
                       <li><input type="checkbox" name="quirks[]" 
                            value="Piscine"<?php if(!empty($_POST['quirks'])){if(in_array('Piscine',$_POST['quirks'])){echo 'checked';}}?>>
                            Piscine
                        </li>
                       <li><input type="checkbox" name="quirks[]" 
                            value="Parking"<?php if(!empty($_POST['quirks'])){if(in_array('Parking',$_POST['quirks'])){echo 'checked';}}?>>
                            Parking
                        </li>
                       <li><input type="checkbox" name="quirks[]" 
                            value="Groupe Electrogène" <?php if(!empty($_POST['quirks'])){if(in_array('Groupe Electrogène',$_POST['quirks'])){echo 'checked';}}?>>
                            Groupe Electrogène
                        </li>
                   </ul>
               </div>
               <div class="btn_container">
                   <button class="finish_btn" name="submit" value="submit">Terminer</button>
               </div>
           <!--Form end-->
    </form>  
    <!--End of userpage-->
    </div>
    <script type="text/javascript" defer>
        //Autocomplete
        $(document).ready(function(){
            $("#quartier").keyup(function(){
                var searchText = $(this).val();
                if(searchText !=''){
                    $.ajax({
                        url: '../lib/autocomplete.php',
                        method: 'post',
                        data:{query:searchText},
                        success: function(response){
                            $(".quartierContainer").html(response);
                        }
                    });
                }else{
                    $(".quartierContainer").html('');
                }
            })
            $(document).on('click','.quartierOption',function(){
                $("#quartier").val($(this).text());
                $(".quartierContainer").html('');
            })
        });
    </script>
    <script defer>
        //Preview image before upload start
        document.getElementById('upload').onchange =function(){
            var imageContainer = document.querySelector('.images');
            for(var i =0;i < upload.files.length;i++){
                var newImage = document.createElement("img");
                imageContainer.appendChild(newImage);
                newImage.src = URL.createObjectURL(upload.files[i])
            }
        }
        //Preview image before upload end
        //Add comma separation to input start
        var inputFields = document.querySelectorAll('[data-input]');
        inputFields.forEach(input =>{
            input.onkeyup = function(){
            var removeChar = this.value.replace(/[^0-9\.]/g,'');
            var removeDot= removeChar.replace(/\./g,'');
            var formatedNumber = removeDot.replace(/\B(?=(\d{3})+(?!\d))/g,'.');
            this.value = formatedNumber;}
        })
        //Add comma separation to input end 
        //Show options depending on choice start
        var type = document.querySelector('#type');
        var houseStats = document.querySelector('#house_stats');
        type.addEventListener('change',()=>{
            if(type.value == "Appart" || type.value == "Maison"){
                if(!houseStats.classList.contains('showSection')){
                    houseStats.classList.add('showSection');
                }
                console.log('house')
            }else if(type.value != "Appart" || type.value !="Maison"){
                if(houseStats.classList.contains('showSection')){
                    houseStats.classList.remove('showSection');
                }
                console.log('not house')

            }
        })
        //Show options depending on choice end
        function bedCounter(){
            var bedInput =document.querySelector('#bedInput');
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
                bedInput.value =num
                })
            })
        }
        function bathCounter(){
            var toiletteInput =document.querySelector('#toiletteInput');
            const toiletteButtons = document.querySelectorAll("[data-bath-btn]");
            const spanToilette = document.getElementById('num_toilettes');
            let num = 0;
            toiletteButtons.forEach(button =>{
            button.addEventListener("click",()=>{
                var value = button.dataset.bathBtn;
                if(value==="increment"){num++}
                else{num--}
                if(num<0){num = 0}
                spanToilette.innerText = num;
                toiletteInput.value = num;
                })
            })
        }
        bedCounter();
        bathCounter();
    </script>
</body>
</html>
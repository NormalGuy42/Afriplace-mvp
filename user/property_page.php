<?php 
    include('../config/connection.php');
    include('../templates/get_user_id.php');
    $propertyID = $_GET['id'];
    //Get location
    $location = $_GET['location'];

    $headerLink = "property_page.php?location=$location&id=$propertyID";

    $sql = "SELECT * FROM  properties WHERE `id`= $propertyID";
    $property = mysqli_fetch_assoc(mysqli_query($db,$sql));
    //Hide
    if(isset($_POST['hideButton'])){
        $propertyID = mysqli_real_escape_string($db,$propertyID);
        $location = mysqli_real_escape_string($db,$location);
        $query = "UPDATE properties SET `statut` = 'offline' WHERE `properties`.`id` = $propertyID";
        mysqli_query($db,$query);
        //Redirect
        header('Refresh: 0');
    }
    //Show
    if(isset($_POST['showButton'])){
        $propertyID = mysqli_real_escape_string($db,$propertyID);
        $location = mysqli_real_escape_string($db,$location);
        $query = "UPDATE properties SET `statut` = 'online' WHERE `properties`.`id` = $propertyID";
        mysqli_query($db,$query);
        //Redirect
        header('Refresh: 0');
    }
    //Delete
    if(isset($_POST['deleteButton'])){
        //Delete images
        $images = explode(',',$property['images']);
        array_pop($images);                
        foreach($images as $img){
            unlink('../'.$img);
        }
        //Delete property
        $propertyID = mysqli_real_escape_string($db,$propertyID);
        $location = mysqli_real_escape_string($db,$location);
        $query = "DELETE FROM properties WHERE `id` = $propertyID";
        mysqli_query($db,$query);
    
        //Redirect
        header('Location: '.$location);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello user</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="userpage.css">
    <script src="../scripts/script.js"></script>
    <script src="user_script.js" defer></script>
    <style>
        .property_info{
            box-shadow: 0 0 2px 2px rgb(0,0,0,30%);
            border-radius: 5px;
            padding-top: 20px;
        }
        .actions{
            display: flex;
            justify-content: end;
            position: relative;
            z-index: 2;
            bottom: -8px;
            right: -2px;
        }
        .actions button{
            background-color: white;
            border: none;
        }
        .action_box{
            border: 2px solid rgb(0,0,0,30%);
            border-radius: 4px;
            background: white;
            border-bottom: none;
            border-bottom-right-radius: 0px;
            border-bottom-left-radius: 0px;
        }
        .action_box svg{
            height: 30px;
            width: 30px;
            margin: 5px 10px;
            cursor: pointer;
        }
        .title{
            padding: 0 20px;
        }
        /*Images*/
        .images .grid{
            display: grid;
            grid-template-columns: repeat(auto-fit,33%);
            gap: 0;
            width: 100%;
        }
        .images li{
            width: 100%;
        }
        .images img{
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
        .info_container{
            width: 80%;
            margin: 20px auto 0;
            font-size: 18px;
        }
        .info_box{
            margin-bottom: 15px;
            display: flex;
        }
        .info{
            font-weight: bold;
        }
        .info_description{
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }
        .info_description ul{
            column-count: 2;
        }
        .priceValue{font-weight: normal;}
        /*status*/
        .info_box span{
            display: flex;
            margin-left: 5px
        }
        .info_box span div{
            display: flex;
        }
        .info_box span .greenStatus{
            color: #05b505;
            align-items: center;
        }
        .info_box span .greenCircle{
            display: block;
            border-radius: 50%;
            width: 5px;
            height: 5px;
            background-color: #05b505;
            margin-left: 5px;
        }
        .info_box span .greyStatus{
            color: gray;
            align-items: center;
        }
        .info_box span .greyCircle{
            display: block;
            border-radius: 50%;
            width: 5px;
            height: 5px;
            background-color: gray;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <!--Header-->
    <?php include('../templates/user_header.php')?>
    <!--Header-->
        <div class="userpage_content">
            <form action="<?php echo htmlspecialchars($headerLink)?>" method="POST" class="actions">
                    <div class="action_box">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="change">
                            <path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 
                            19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 
                            489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 
                            220.3 291.7 90.3z"/>
                        </svg>
                    </div>
                    <div class="action_box">
                        <?php if($property['statut'] == "online"):?>
                            <button name="hideButton" value="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" >
                                    <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 
                                    243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 
                                    207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 
                                    3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 
                                    32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 
                                    64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 
                                    13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 
                                    6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                </svg>
                            </button>
                        <?php endif?>
                        <?php if($property['statut']!="online"):?>
                            <button name="showButton" value="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="hide">
                                    <path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 
                                    25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 
                                    79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 
                                    68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 
                                    149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 
                                    48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 
                                    4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 
                                    13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 
                                    10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 
                                    220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 
                                    239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/>
                                </svg>
                            </button>
                        <?php endif?>
                    </div>
                    <div class="action_box">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="delete">
                            <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 
                            32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 
                            0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 
                            45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                        </svg>
                    </div>
                    <div class="action_box">
                        <a href="<?php echo htmlspecialchars($_GET['location'])?>">
                            <svg viewBox="0 0 24 24" class="return" xmlns="http://www.w3.org/2000/svg" onclick=>
                                <path d="M11.8 11.8L4 4l7.8 7.8L4 19.6l7.8-7.8zm0 0l7.8 7.8-7.8-7.8L19.6 4l-7.8 7.8z" stroke="black" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </div>
            </form>
            <div class="property_info">
                <h1 class="title"><?php echo htmlspecialchars($property['title'])?></h1>
                <div class="images">
                    <ul class="grid">
                    <?php
                        $images = explode(',',$property['images']);
                        array_pop($images);
                        foreach($images as $img):  
                    ?>
                        <li><img src="<?php echo htmlspecialchars('../'.$img)?>" alt=""></li>
                    <?php endforeach?>
                    </ul>
                </div>
                <div class="info_container">
                    <div class="info_box">
                        <label class="info">Prix:</label>
                        <span class="priceValue"><?php echo htmlspecialchars($property['price'])?></span>
                    </div>
                    <div class="info_box">
                        <label class="info">Type:</label>
                        <span><?php echo htmlspecialchars($property['type'])?></span>
                    </div>
                    <div class="info_box">
                        <label class="info">Statut:</label>
                        <span>
                            <?php
                                $statut = $property['statut'];
                                if($statut=="online"){
                                    echo "<div class='greenStatus'>en ligne <div class='greenCircle'></div></div>";
                                }else{
                                    echo "<div class='greyStatus'>pas en ligne <div class='greyCircle'></div></div>";
                                }
                            ?>
                        </span>
                    </div>
                    <div class="info_box">
                        <label class="info">Nombre de messages:</label>
                        <span><?php echo htmlspecialchars($property['messages'])?></span>
                    </div>
                    <div class="info_box">
                        <label class="info">Nombre de vues:</label>
                        <span><?php echo htmlspecialchars($property['views'])?></span>
                    </div>
                    <div class="info_box">
                        <label class="info">Quartier:</label>
                        <span><?php echo htmlspecialchars($property['quartier'])?></span>
                    </div>
                    <div class="info_box">
                        <label class="info">Localisation:</label>
                        <span><?php echo htmlspecialchars($property['localisation'])?></span>
                    </div>
                    <div class="info_box">
                        <label class="info">Chambres:</label>
                        <span><?php echo htmlspecialchars($property['bedNum'])?></span>
                    </div>
                    <div class="info_box">
                        <label class="info">Toilettes:</label>
                        <span><?php echo htmlspecialchars($property['toiletteNum'])?></span>
                    </div>
                    <div class="info_box">
                        <label class="info">Surface:</label>
                        <span><?php echo htmlspecialchars($property['surface'])?></span>
                    </div>
                    <div class="info_description">
                        <label class="info">Description:</label>
                        <p>
                        <?php echo htmlspecialchars($property['description'])?>
                        </p>
                    </div>
                    <?php if($property['quirks']!='null'):?>
                        <div class="info_description">
                            <label class="info">Installations:</label>
                            <ul>
                                <?php 
                                $quirks = explode(',',$property['quirks']);
                                foreach($quirks as $q):
                                ?>
                                <?php echo "<li>$q</li>"?>
                                <?php endforeach?>
                            </ul>
                        </div>
                    <?php endif?>
                </div>
            </div>
        </div> 
    </div>
    <script>
        //Add comma separation to price
        var prices = document.querySelectorAll('.priceValue');
        prices.forEach(price =>{
            priceValue = price.textContent;
            var formatedNumber = priceValue.replace(/\B(?=(\d{3})+(?!\d))/g,'.');
            price.textContent = formatedNumber;
        }
        )
        //Add comma separation to price end
        var deleteButtons = document.querySelectorAll('.delete');
        deleteButtons.forEach(btn=>{
            btn.addEventListener('click',(e)=>{
                //Handle actions
                var popup = document.createElement('div');
                popup.classList.add('popup')
                var popupHTML = 
                `
                <div class="screen_overlay">
                    <div class="deletePopup">
                            <div class="text_container">
                            <h3>Voulez vous vraiment supprimer cette propriété</h3>
                            <p>Cette action est irréversible. Voulez vous quand même continuer?</p>
                            </div>
                            <form action="<?php echo $headerLink?>" method="POST">
                                <div class="flex">
                                    <button class="cancel" type="button">Annuler</button>
                                    <button class="deleteButton" name="deleteButton">Supprimer</button>
                                </div>
                            </form>
                    </div>
                </div>
                `;
                popup.innerHTML = popupHTML;
                //Append popup
                var body = document.querySelector('body');
                body.appendChild(popup);
            })
        })
        //Remove popup if clicked on cancel or outside popup
        document.addEventListener('click',(e)=>{
            var popup = document.querySelector('.popup');
            var body = document.querySelector('body');
            if(e.target.closest('.cancel') || e.target.closest('.screen_overlay')){
                if(!e.target.closest('.text_container') && !e.target.closest('.deleteButton')){
                    body.removeChild(popup);
                }
            }
        })
    </script>
</body>
</html>
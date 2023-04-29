<?php
    include('../config/connection.php');
    $propertyID = $_GET['id'];
    $sql = "SELECT * FROM  properties WHERE `id`= $propertyID";
    $property = mysqli_fetch_assoc(mysqli_query($db,$sql));
    //Get user info
    $user = $property['userID'];
    $userQuery = "SELECT nom,prenom,display_name FROM users WHERE id=$user";
    $userInfo = mysqli_fetch_assoc(mysqli_query($db,$userQuery));
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Page</title>
    <link rel="stylesheet" href="admin_style.css">
    <script src="admin_script.js" defer></script>
    <style>
        .property_info{
            box-shadow: 0 0 2px 2px rgb(0,0,0,30%);
            border-radius: 5px;
            padding: 20px 0;
        }
        .actions{
            display: flex;
            justify-content: end;
            position: relative;
            z-index: 2;
            bottom: -8px;
            right: -2px;
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
        .images{
            height: fit-content;
            margin-bottom: 10px;
        }
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
            margin-top: 0;
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
    <?php include('../templates/admin_templates.php')?>
            <div class="main_body">
            <div class="actions">
                    <div class="action_box">
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
                    </div>
                    <div class="action_box">
                        <svg viewBox="0 0 24 24" class="return" xmlns="http://www.w3.org/2000/svg" onclick="history.back()">
                            <path d="M11.8 11.8L4 4l7.8 7.8L4 19.6l7.8-7.8zm0 0l7.8 7.8-7.8-7.8L19.6 4l-7.8 7.8z" stroke="black" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                </div>
            <div class="property_info">
                <h1 class="title"><?php echo htmlspecialchars($property['title'])?></h1>
                <div class="images">
                    <ul class="grid">
                    <?php
                        $images = explode(',',$property['images']);
                        array_pop($images);
                        // $imagesLength = sizeof($imagesArray)-1;
                        // $images = array_splice($imagesArray,$imagesLength);
                        foreach($images as $img):  
                    ?>
                        <li><img src="<?php echo htmlspecialchars('../'.$img)?>" alt=""></li>
                    <?php endforeach?>
                    </ul>
                </div>
                <div class="info_container">
                    <div class="info_box">
                        <label class="info">Prix:</label>
                        <span><?php echo htmlspecialchars($property['price'])?></span>
                    </div>
                    <div class="info_box">
                        <label class="info">Type:</label>
                        <span><?php echo htmlspecialchars($property['type'])?></span>
                    </div>
                    <div class="info_box">
                        <label class="info">
                        <?php
                            if($userInfo['display_name']=="null"){
                                echo 'Propriétaire:';
                            }
                            else{
                                echo 'Agence';
                            }
                        ?>
                        </label>
                        <span>
                            <?php
                                if($userInfo['display_name']=="null"){
                                    echo $userInfo['nom'].' '.$userInfo['prenom'];
                                }
                                else{
                                    echo $userInfo['display_name'];
                                }
                            ?>
                        </span>
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
    </section>
</body>
</html>
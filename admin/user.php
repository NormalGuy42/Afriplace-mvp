<?php
    include('../config/connection.php');
    $userID = $_GET['id'];
    $sql = "SELECT * FROM  users WHERE `id`= $userID";
    $user = mysqli_fetch_assoc(mysqli_query($db,$sql));
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="admin_style.css">
    <script src="admin_script.js" defer></script>
    <style>
        .property_info{
            box-shadow: 0 0 2px 2px rgb(0,0,0,30%);
            border-radius: 5px;
            padding-top: 20px;
            padding-bottom: 20px;
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
                        <svg viewBox="0 0 24 24" class="return" xmlns="http://www.w3.org/2000/svg" onclick="history.back()">
                            <path d="M11.8 11.8L4 4l7.8 7.8L4 19.6l7.8-7.8zm0 0l7.8 7.8-7.8-7.8L19.6 4l-7.8 7.8z" stroke="black" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                </div>
            <div class="property_info">
                <h1 class="title">
                    <?php 
                    if($user['display_name']=='null'){
                        echo htmlspecialchars($user['nom'].' '.$user['prenom']);
                    }else{
                        echo htmlspecialchars($user['display_name']);
                    }
                    ?>
                </h1>
                <div class="info_container">
                    <div class="info_box">
                        <label class="info">Nom:</label>
                        <span><?php echo htmlspecialchars($user['nom'])?></span>
                    </div>
                    <div class="info_box">
                        <label class="info">Prenom:</label>
                        <span><?php echo htmlspecialchars($user['prenom'])?></span>
                    </div>
                   <div class="info_box">
                        <label class="info">Agence:</label>
                        <span><?php 
                            if($user['display_name']!='null'){
                                echo htmlspecialchars($user['display_name']);
                            }else{
                                echo htmlspecialchars('Non');
                            }
                        ?></span>
                    </div> 
                    <div class="info_box">
                        <label class="info">Profession:</label>
                        <span><?php echo htmlspecialchars($user['profession'])?></span>
                    </div>
                    <div class="info_box">
                        <label class="info">Email:</label>
                        <span><?php echo htmlspecialchars($user['email'])?></span>
                    </div>
                    <div class="info_box">
                        <label class="info">Numero:</label>
                        <span><?php echo htmlspecialchars($user['numero'])?></span>
                    </div>
                    <div class="info_box">
                        <label class="info">Pays:</label>
                        <span><?php echo htmlspecialchars($user['pays'])?></span>
                    </div>
                    <div class="info_box">
                        <label class="info">Création de compte:</label>
                        <span><?php echo htmlspecialchars($user['created_at'])?></span>
                    </div>
                </div>
            </div>
            </div>
    </section>
</body>
</html>
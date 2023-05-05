<?php 
    include('../config/connection.php');
    include('../templates/get_user_id.php');
    if(isset($_POST['logout'])){
        logout();
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
        .logout{
            display: block;
            background-color: white;
            padding: 5px;
            border: 2px solid red;
            color: red;
            width: 200px;
            text-align: center;
            cursor: pointer;
            margin: 0 auto;
            font-size: 18px;
        }
        .logout:hover{
            background-color: red;
            color: white;
        }
        .hidden{
            display: none;
        }
        /*container*/
        .container{
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        .container .section{
            display: flex;
            flex-direction: column;
        }
        .container .section .container_title{
            font-weight: bold;
            font-size: 22px;
        }
        .container img{
            height: 120px;
            width: 120px;
        }
    </style>
</head>
<body>
    <!--Header-->
    <?php include('../templates/user_header.php')?>
    <!--Header-->
        <div class="userpage_content">
            <h1 class="title">Paramètres</h1>
            <div class="line"></div>
            <div class="container">
                <div class="icon">
                    <img src="../assets/person_icon_black.svg" alt="">
                </div>
                <div class="section">
                <div class="container_title">
                    Votre compte
                </div>
                <p>Modifier les informations de votre compte</p>
                </div>
            </div>
           <form action="settings.php" method="POST">
                <button class="logout" name="logout" value="submit">Deconnexion</button>
           </form>
        </div>
    </div>
</body>
</html>
<?php 
    include('../config/connection.php');
    include('../templates/get_user_id.php');
    include('../lib/user_authentication.php');

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
        }
        .hidden{
            display: none;
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
           <form action="settings.php" method="POST">
                <button class="logout" name="logout" value="submit">Deconnexion</button>
           </form>
        </div>
    </div>
</body>
</html>
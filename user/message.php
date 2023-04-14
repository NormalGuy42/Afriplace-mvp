<?php include('../config/connection.php')?>
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
</head>
<body>
    <!--Header-->
    <?php include('../templates/user_header.php')?>
    <!--Header-->
        <div class="userpage_content">
            <h1 class="title">Messages</h1>
            <div class="line"></div>
            <div class="messages">
                <div class="container">
                    <div class="card">
                        <img src="../assets/user-pfp.png" alt="">
                        <label class="name">Name</label>
                        <label class="message_title">Pour: <span>property name</span></label>
                        <label>Je veux visiter</label>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque officiis qui excepturi reprehenderit 
                        ea corporis possimus cum consequatur itaque illum?</p>
                        <div class="btn_container">
                            <button class="ignore">Rejeter</button>
                            <button class="respond">Répondre</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
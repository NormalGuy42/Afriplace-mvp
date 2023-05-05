<?php 
    include('../config/connection.php');
    include('../templates/get_user_id.php');
    $userID = mysqli_real_escape_string($db,$id);
    $messagesSql = "SELECT * FROM messages WHERE user_ID= $userID ORDER BY id DESC";
    $messages = mysqli_query($db,$messagesSql);
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
</head>
<body>
    <!--Header-->
    <?php include('../templates/user_header.php')?>
    <!--Header-->
        <div class="userpage_content">
            <h1 class="title">Messages</h1>
            <div class="line"></div>
            <?php if(mysqli_num_rows($messages)>0):?>
                <div class="messages">
                    <?php foreach($messages as $msg):?>
                        <div class="container">
                            <div class="card">
                                <img src="../assets/user-pfp.png" alt="">
                                <label class="name"><?php echo htmlspecialchars($msg['name'])?></label>
                                <label class="message_title">Pour: <span><?php echo htmlspecialchars($msg['property_name'])?></span></label>
                                <label><?php echo htmlspecialchars($msg['objet'])?></label>
                                <p><?php echo htmlspecialchars($msg['message'])?></p>
                                <div class="btn_container">
                                    <button class="ignore">Rejeter</button>
                                    <button class="respond">Répondre</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach?>
                </div>
            <?php endif?>
            <?php if(mysqli_num_rows($messages)<1):?>
                <div class="emptySection">
                    <div>Aucun message</div>
                </div>
            <?php endif?>
        </div>
    </div>
</body>
</html>
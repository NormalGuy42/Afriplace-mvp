<?php
    include('../config/connection.php');
    $query = "SELECT * FROM admin_messages";
    $messages = mysqli_query($db,$query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="admin_style.css">
    <script src="admin_script.js" defer></script>
    <style>
        /*Messages start*/
        .messages{
            display: flex;
            align-items: center;
            flex-direction: column;
            width: 100%;
            padding-top: 50px;
        }
        .messages .container{
            width: 100%;
        }
        .messages .card{
            min-width:300px;
            max-width: 700px;
            width: 70%;
            margin: 0 auto 25px;
            box-shadow: 0 0 2px 2px rgb(0,0,0,30%);
        }
        .messages .card img{
            display: block;
            height: 60px;
            width: 60px;
            margin: 0 auto;
        }
        .messages .card .object{
            margin-top: 5px;
            font-weight: bold;
        }
        .messages .card label{
            display: block;
            text-align: center;
        }
        .messages .message_title{
            margin-bottom: 5px;
        }
        .messages .card span{
            font-weight: bold;
        }
        .messages .card p{
            width: 100%;
            letter-spacing: 0.03rem;
            margin-bottom: 8px;
            padding: 3px 5px 5px;
        }
        .messages .card .btn_container{
            display: flex;
        }
        .messages .card button{
            width: 50%;
            height: 40px;
            font-size: 18px;
            display: block;
            background-color: #eee;
            border: 1px solid black;
        }
        button.respond{
            color: white;
            background-color: var(--main-color) !important;
            border-collapse: collapse;
        }
        /*Messages end*/
    </style>
</head>
<body>
   
    <?php include('../templates/admin_templates.php')?>  
        <div class="messages">
            <div class="container">
                <?php foreach($messages as $msg):?>
                    <div class="card">
                        <img src="../assets/user-pfp.png" alt="">
                        <label class="name"><?php echo htmlspecialchars($msg['last_name'].' '.$msg['first_name'])?></label>
                        <label class="object"><?php echo htmlspecialchars($msg['object'])?></label>
                        <p><?php echo htmlspecialchars($msg['message'])?></p>
                        <div class="btn_container">
                            <button class="ignore">Rejeter</button>
                            <button class="respond">Répondre</button>
                        </div>
                    </div>
                <?php endforeach?>
            </div>
        </div>
    </section>
</body>
</html>
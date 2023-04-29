<?php
    include('../config/connection.php');
    $sql = "SELECT * FROM users";
    $users = mysqli_query($db,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="admin_style.css">
    <script src="admin_script.js" defer></script>
    <style>
        .title h3{
            font-size: 25px;
        }
        .user_section {
            width: 100%;
            padding: 30px 30px 0px;
            box-sizing: border-box;
        }
        .user_section .title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 3px;
            border-bottom: 3px solid gray;
        }
        .user_section .advanced_search {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        .user_section .advanced_search input {
            height: 28px;
            font-size: 18px;
            border-radius: 4px;
            border: 1px solid #6d6d6e;
            padding: 0 15px;
            box-sizing: border-box;
            max-width: 225px;
            min-width: 180px;
            width: 20%;
        }
        .user_section .advanced_search button {
            background-color: white;
            border-radius: 5px;
            border: 1px solid;
            height: 30px;
            width: 80px;
            font-size: 18px;
            cursor: pointer;
        }
        .user_section svg {
            height: 15px;
            width: 15px;
        }
        /*User info start*/
        .user_section li{
            background-color: white;
        }
        .user_section li:nth-child(even){
            background-color: #bdbbbb;
        }
        .userbox {
            box-sizing: border-box;
            padding: 20px 0 20px 15px;
            display: flex;
            width: 100%;
            border-collapse: collapse;
            cursor: pointer;
        }
        .userbox .box {
            width: 25%;
            min-width: 65px;
            height: 40px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        div[data-box="propertyNum"]{text-align: center;}
        /*User info end*/
        @media (max-width:600px) {
            .user_section{
                padding: 30px 15px 0;
            }
            .userbox .box{
                width: 30%;
            }
            div[data-box="propertyNum"]{width: 10%;min-width: 20px;}
            div[data-box="email"]{display:none !important;}
        }
    </style>
</head>
<body>
    <?php include('../templates/admin_templates.php')?>
        <div class="user_section">
            <div class="user_container">
                <div class="title">
                    <h3>Utilisateurs: <span><?php echo mysqli_num_rows($users)?><span></h3>
                    <!-- <svg role="img" aria-label="" aria-hidden="true" class="svg" viewBox="0 2 30 28" 
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.961 18.183l7.056-7.147 1.893 1.868-8.951 9.068-8.927-9.069 1.896-1.866z" 
                        fill="black"></path>
                    </svg> -->
                </div>
                <!--Search-->
                <div class="advanced_search">
                    <input type="text" placeholder="Enter id">
                    <button>
                        <svg viewBox="0 0 24 24">
                            <g fill-rule="evenodd">
                                <path d="M23.75 19H15v-1.75a.25.25 0 00-.25-.25h-8.5a.25.25 0 00-.25.25V19H.25a.25.25 
                                0 00-.25.25v1.5c0 .138.112.25.25.25H6v1.75c0 .138.112.25.25.25h8.5a.25.25 0 
                                00.25-.25V21h8.75a.25.25 0 00.25-.25v-1.5a.25.25 0 00-.25-.25zM8 
                                19h5v2H8v-2zm15.75-8H21V9.25a.25.25 0 00-.25-.25h-8.5a.25.25 0 00-.25.25V11H.25a.25.25 0 
                                00-.25.25v1.5c0 .138.112.25.25.25H12v1.75c0 .138.112.25.25.25h8.5a.25.25 0 00.25-.25V13h2.75a.25.25 
                                0 00.25-.25v-1.5a.25.25 0 00-.25-.25zM14 11h5v2h-5v-2zm9.75-8H12V1.25a.25.25 0 00-.25-.25h-8.5a.25.25 
                                0 00-.25.25V3H.25a.25.25 0 00-.25.25v1.5c0 .138.112.25.25.25H3v1.75c0 .138.112.25.25.25h8.5a.25.25 0 
                                00.25-.25V5h11.75a.25.25 0 00.25-.25v-1.5a.25.25 0 00-.25-.25zM5 3h5v2H5V3z">
                                </path>
                            </g>
                        </svg>
                        Filter
                    </button>
                </div>
                <ul class="users_list">
                <?php foreach($users as $user):?>
                    <li>
                        <a href="user.php?id=<?php echo $user['id']?>">
                            <div class="userbox">
                                <!-- <div class="box"><img src="../assets/user-pfp.png" alt=""></div> -->
                                <div class="box"><?php echo $user['nom'];?></div>
                                <div class="box"><?php echo $user['prenom'];?></div>
                                <div class="box" data-box="email"><?php echo $user['email'];?></div>
                                <div class="box" data-box="display_name">
                                    <?php if($user['display_name'] !="null"){echo $user['display_name'];}
                                        else{
                                            echo "Pas une agence";
                                        }
                                    ?>
                                </div>
                                <div class="box" data-box="propertyNum">
                                    <?php
                                        $id = $user['id'];
                                        $query = "SELECT id from properties WHERE userID= $id";
                                        $result = mysqli_num_rows(mysqli_query($db,$query));
                                        echo $result;
                                    ?>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php endforeach?>
                </ul>
            </div>
        </div>
    </section>
</body>
</html>
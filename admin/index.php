<?php 
    //Connect to database
    $conn = "";
    try {
        include('../config/connection.php');
        $conn = new PDO(
            "mysql:host=$servername; dbname=$dbname",
            $username, $password
        );
        
    $conn->setAttribute(PDO::ATTR_ERRMODE,
                        PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    //Connect to database end
    //Validate start
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion</title>
    <link rel="stylesheet" href="admin_style.css">
    <style>
       /*Login start*/
        .sign-in_box{
            width: 100%;
            padding-top: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        form{
            margin: 0 auto;
        }
        .userbox{
            width: 460px;
            text-align: center;
            padding: 30px;
            /* box-shadow: 0 0 12px 0 rgb(0 0 0 / 15%); */
            display: block;
            border-bottom: 1px solid rgb(216, 216, 216);
        }
        h3{
            font-size: 28px;
            font-weight: normal;
        }
        .connexion{
            width: 100%;
            height: 45px;
            border-radius: 4px;
            font-size: 1.2rem;
            color: white;
            background-color: orange;
            display: block;
            margin-bottom: 8px;
            cursor: pointer;
        }
        
        .login_field{
            box-sizing: border-box;
            display: block;
            width: 100%;
            margin: 1rem 0;
            padding: 0.6rem;
            font-size: 1.2rem;
            border: 1px solid rgb(133, 133, 133);
        }
        .login_field.textarea{
            height: 150px;
            margin: 0;
            font-family: arial;
            border: 1px solid rgb(133, 133, 133);
            border-radius: 3px;
        }
        .error{
            color: red;
            text-align: center;
            margin-top: 15px;
        }
        @media (max-width:390px) {
            .admin_logo_area{
                margin-left: -150px;
                width: 300px;
            }
        }    
    </style>
</head>
<body>
    <!--Header-->
    <header class="header_container">
        <nav>
            <div class="admin_logo_area">
                <a href="../index.php"><span><label class="logo">afriplace</label></span></a>
            </div>
        </nav>
    </header>
    <?php
            $error ="";
            session_start();
            $_SESSION['isLogged'] = false;
            $errors = ['username'=>'','password'=>''];
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = test_input($_POST["username"]);
                $password = test_input($_POST["password"]);
                $stmt = $conn->prepare("SELECT * FROM admin_login");
                $stmt->execute();
                $users = $stmt->fetchAll();
                
                foreach($users as $user) {
                    if(($user['username'] == $username) &&
                        ($user['password'] == $password)) {
                            header("location: admin.php");
                            $_SESSION['isLogged'] = true;
                    }
                    else{
                        $error = '<div class="error">Mot de Passe ou Identifiant incorrect. Réesayez!</div>';
                    }
                }
            }        
            ?>
        <?php echo $error?>
    <section class="sign-in_box">
        <div class="userbox">
            <form action="index.php" method="POST">
                <h3>Bienvenue</h3>
                <input class="login_field" type="text" placeholder="Identifiant"  name="username" autocomplete="off"/>
                <div class="error"><?php echo htmlspecialchars($errors['username'])?></div>
                <input class="login_field" type="password" placeholder="Mot de passe" name="password" autocomplete="off"/>
                <div class="error"><?php echo htmlspecialchars($errors['password'])?></div>
                <button class="connexion" name="submit" value="submit">Connexion</button>
            </form>
        </div>
    </section>
</body>
</html>
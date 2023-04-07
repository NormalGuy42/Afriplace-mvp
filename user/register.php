<?php
    $errors =['nom'=>'','prenom'=>'','numero'=>'','password'=>'','email'=>'','profession' =>''];
    $nom = $prenom = $numero = $password = $email = $profession = "";
    if(isset($_POST['submit'])){
        //Check name
        if(empty($_POST['nom'])){
            $errors['nom'] = 'Vous devez entrer un nom';
        }else{
            $nom = $_POST['nom'];
            if(!preg_match('/^[a-zA-Z\s]+$/',$nom)){
                $errors['nom'] = 'Votre nom ne peut contenir que des lettres';
            }
        }
        //Check last name
        if(empty($_POST['prenom'])){
            $errors['prenom'] = 'Vous devez entrer un prenom';
        }else{
            $prenom = $_POST['prenom'];
            if(!preg_match('/^[a-zA-Z\s]+$/',$prenom)){
                $errors['prenom'] = 'Votre prenom ne peut contenir que des lettres';
            }
        }
        //Check phone number
        if(empty($_POST['numero'])){
            $errors['numero'] = 'Entrez votre numero de téléphone';
        }
        else{
            $numero = $_POST['numero'];
            if(!preg_match('/^\+?[1-9][0-9]{7,14}$/',$numero)){
                $errors['numero'] = 'Format du numero incorrect';
            }
        }
        //Check profession
        if(empty($_POST['profession'])){
            $errors['profession'] = 'Entrez votre profession';
        }
        else{
            $profession = $_POST['profession'];
            if(!preg_match('/^[a-zA-Z\s]+$/',$profession)){
                $errors['profession'] = 'Votre profession ne peut comporter que des lettres';
            }
        }
        //Check email
        if(empty($_POST['email'])){
            $errors['email'] = 'Entrez votre email';
        }else{
            $email = $_POST['email'];
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Votre email doit être une adresse email valide';
            }
        }
        //Check password
        if(empty($_POST['password'])){
            $errors['password'] = 'Vous devez entrer un mot de passe';
        }else{
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            if($password != $password2){
                $errors['password'] = 'Les deux mot de passe doivent etre les mêmes';
            }
        }

        //If there are no errors
        include('../config/connection.php');
        if(!array_filter($errors)){
            //Variables
            $nom = mysqli_real_escape_string($db,$_POST['nom']);
            $prenom = mysqli_real_escape_string($db,$_POST['prenom']);
            $numero = mysqli_real_escape_string($db,$_POST['numero']);
            $profession = mysqli_real_escape_string($db,$_POST['profession']);
            $email= mysqli_real_escape_string($db,$_POST['email']);
            $password = mysqli_real_escape_string($db,$_POST['password']);
            //Insert sql
            $sql = "INSERT INTO users(nom,prenom,numero,profession,email,password) VALUES('$nom','$prenom','$numero','$profession','$email','$password')";
            $userID = "SELECT id FROM users WHERE email= $email";
            if(mysqli_query($db,$sql)){
                $sql = "SELECT id FROM users WHERE email = '$email'";
                $userID = mysqli_fetch_assoc(mysqli_query($db,$sql));
                header("location: userpage.php?id=".$userID['id']);
            }
            //
            '
            Kane
            Mamadou
            Agent Immobilier
            622122364
            kane72@gmail.com
            200410
            200410
            ';
        } 
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="userpage.css">
    <script src="https://kit.fontawesome.com/92960f12ec.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--Header start-->
    <header class="header_container">
        <nav>
            <svg class="burger" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="svg" version="1.1" 
            width="400" height="400" viewBox="0, 0, 400,400">
                <g id="svgg">
                    <path id="path0" d="M60.169 74.148 C 47.307 78.873,46.513 97.065,58.895 103.329 L 61.011 104.400 204.800 104.400 
                    L 348.589 104.400 350.794 103.303 C 353.391 102.011,356.886 98.629,357.821 
                    96.503 C 358.184 95.676,358.682 94.579,358.928 94.064 C 359.575 92.705,359.507 
                    86.134,358.823 84.000 C 357.606 80.200,354.434 76.679,350.535 74.798 L 348.050 
                    73.600 204.725 73.648 C 99.229 73.683,61.075 73.815,60.169 74.148 M62.200 170.182 C 47.700 173.758,45.600 193.882,59.041 
                    200.451 L 61.800 201.800 204.800 201.800 L 347.800 201.800 350.479 200.490 C 356.965 
                    197.317,360.468 190.657,359.400 183.529 C 359.180 182.061,358.865 180.726,358.700 180.563 C 358.535 180.400,358.400 180.017,358.400 
                    179.711 C 358.400 176.719,352.298 171.459,347.325 170.164 C 344.316 169.380,65.379 169.398,62.200 170.182 M60.973 267.526 
                    C 46.699 272.270,46.388 293.278,60.515 298.442 C 63.768 299.631,345.832 299.631,349.085 298.442 
                    C 363.245 293.266,362.974 272.618,348.681 267.595 C 345.416 266.447,64.422 266.380,60.973 267.526 "stroke="none" 
                    fill="#040404" fill-rule="evenodd" class="">
                    </path>
                </g>
            </svg>
            <div class="logo_area">
                <a href="../index.php"><span><label class="logo">afriplace</label></span></a>
            </div>
            <ul class="nav_ul">
                <li><a href="../index.php">Acceuil</a></li>
                <li><a href="../searchpage.php">Achetez</a></li>
                <li><a href="../searchpage.php">Louez</a></li>
                <li><a href="user/userpage.php">Listez</a></li>
                <li><a href="../contact.php">Contactez-nous</a></li>
                <li><a href="#"><img src="../assets/guinea.jpg"></a></li>
            </ul>
        </nav>
    </header>
    <!--Header start-->
    <section class="sign-in_box">
        <div class="userbox">
            <form action="register.php" method="POST">
                <h3>Créer un compte</h3>
                <ul>
                    <li><input class="login_field name" type="text" placeholder="Nom" maxlength="30" name="nom" autocomplete="off" value="<?php echo $nom?>"></li>
                    <li><input class="login_field name" type="text" placeholder="Prénom" maxlength="30" name="prenom" autocomplete="off" value="<?php echo $prenom?>"></li>
                </ul>
                <div class="error"><?php echo $errors['nom']?></div>
                <div class="error"><?php echo $errors['prenom']?></div>
                <input class="login_field" type="text" placeholder="Profession" maxlength="30" name="profession" autocomplete="off" value="<?php echo $profession?>">
                <div class="error"><?php echo $errors['profession']?></div>
                <input class="login_field" type="tel" placeholder="Numero de téléphone" maxlength="30" name="numero" autocomplete="off" value="<?php echo $numero?>">
                <div class="error"><?php echo $errors['numero']?></div>
                <input class="login_field" type="email" placeholder="Email" name="email" autocomplete="off" value="<?php echo $email?>">
                <div class="error"><?php echo $errors['email']?></div>
                <input class="login_field" type="password" placeholder="Mot de passe" name="password" autocomplete="off" value="<?php echo $password?>">
                <div class="error"><?php echo $errors['password']?></div>
                <input class="login_field" type="password" placeholder="Confirmer Mot de passe" name="password2" autocomplete="off" value="<?php echo $password?>">
                <button class="connexion" name="submit" value="submit">Créez mon compte</button>
                <h4 class="forgot">
                    Bienvenue à afriplace
                </h4>
                <h5><span>Vous avez déja un compte?</span><a href="login.php" class="link_text">Connectez-vous</a></h5>
            </form>
        </div>
    </section>
</body>
</html>
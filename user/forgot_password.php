<?php 
    //Connect to database
    include('../config/connection.php');
    $error = '';
    $emailError ='';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="userpage.css" />
    <script src="../scripts/script.js" defer></script>
</head>
<body>
     <!--Header-->
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
    <section class="sign-in_box">
        <div class="userbox">
            <form action="login.php" method="POST">
                <h3>Mot de passe</h3>
                <?php echo $error?>
                <input class="login_field" type="text" placeholder="Entrez votre email" name="email" autocomplete="off"/>
                <div class="error"><?php echo htmlspecialchars($emailError)?></div>
                <button class="connexion" name="submit" value="submit">Envoyer un email</button>
                <h4 class="forgot">
                    <a href="login.php" class="forgot_link">Revenir en arrière</a>
                </h4>
                <h5>
                    <span>Pas de compte?</span><a href="register.php" class="link_text">Créez-en un</a>
                </h5>
            </form>
        </div>
    </section>
</body>
</html>
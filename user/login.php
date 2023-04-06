<?php 
    $id = $password = '';
    $errors = ['id'=>'','password'=>''];

    if(isset($_POST['submit'])){
        if(empty($_POST['id'])){
            $errors['id'] = "Vous devez entrer un identifiant";
        }
        if(empty($_POST['password'])){
            $errors['password'] = "Vous devez entrer un mot de passe";
        }
        //Check if there are no errors
        if(!array_filter($errors)){
            header('Location: userpage.php');
        }
    }
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
    <script src="https://kit.fontawesome.com/92960f12ec.js" crossorigin="anonymous"></script>
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
                <h3>Bienvenue</h3>
                <input class="login_field" type="text" placeholder="Identifiant"  name="id"/>
                <div class="error"><?php echo htmlspecialchars($errors['id'])?></div>
                <input class="login_field" type="password" placeholder="Mot de passe" name="password"/>
                <div class="error"><?php echo htmlspecialchars($errors['password'])?></div>
                <button class="connexion" name="submit" value="submit">Connexion</button>
                <h4 class="forgot">
                    <a href="#" class="forgot_link">Mot de passe oublié?</a>
                </h4>
                <!-- <div class="connect_options"> 
                    <h4>Se connecter avec</h4>
                    <button type="submit" class="login_button btn-facebook">
                        <svg viewBox="0 0 200 200" aria-hidden="true" fill="currentColor"
                            preserveAspectRatio="xMinYMin meet" focusable="false">
                            <title>Facebook</title>
                            <path
                                d="M200 100a100 100 0 1 0-115.6 98.8v-69.9H59V100h25.4V78c0-25 14.9-39 37.7-39 11 0 22.4 2 22.4 2v24.6H132c-12.4 0-16.3 7.7-16.3 15.6V100h27.8l-4.5 29h-23.3v69.8A100 100 0 0 0 200 100"
                                stroke="none"></path>
                        </svg>
                        Continuer avec Facebook
                    </button>
                    <button type="submit" class="login_button btn-google">
                        <svg viewBox="0 0 48 48" preserveAspectRatio="xMinYMin meet" focusable="false"
                            aria-hidden="true">
                            <title>Google Logo</title>
                            <clipPath id="g">
                                <path d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8
                            -13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 
                            2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"></path>
                            </clipPath>
                            <g class="colors" clip-path="url(#g)">
                                <path fill="#FBBC05" d="M0 37V11l17 13z"></path>
                                <path fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"></path>
                                <path fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"></path>
                                <path fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"></path>
                            </g>
                        </svg>
                        Continuer avec Google
                    </button>
                </div> -->
                <h5>
                    <span>Pas de compte?</span><a href="register.php" class="link_text">Créez-en un</a>
                </h5>
            </form>
        </div>
    </section>
</body>

</html>
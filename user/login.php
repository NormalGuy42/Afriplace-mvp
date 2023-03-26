<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/userpage.css" />
    <script src="https://kit.fontawesome.com/92960f12ec.js" crossorigin="anonymous"></script>
</head>

<body>
    <!--Header-->
    <?php include('../templates/user_header.php')?>
    <!--Header-->
    <section class="sign-in_box">
        <div class="userbox">
            <form action="sign-in">
                <h3>Bienvenue</h3>
                <input class="login_field" type="email" placeholder="Email" />
                <input class="login_field" type="password" placeholder="Mot de passe" />
                <button class="connexion">Connexion</button>
                <h4 class="forgot">
                    <a href="#" class="forgot_link">Mot de passe oublié?</a>
                </h4>
                <div class="connect_options">
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
                </div>
                <h5>
                    <span>Pas de compte?</span><a href="register.html" class="link_text">Créez-en un</a>
                </h5>
            </form>
        </div>
    </section>
    <!--Footer-->
    <?php include('../templates/footer.php')?>
    <!--Footer-->
</body>

</html>
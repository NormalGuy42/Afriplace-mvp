<?php
    include('config/connection.php');
    //Session initialization
    session_start();
    $_SESSION['isLogged'] = false;
    //Search functionality
    if(isset($_GET['search'])){
        $type = $_GET['type'];
        $action = $_GET['action'];
        $place = $_GET['place'];

    }

    //Newsletter submission
    $success = '';
    $content = '';
    $error = ['email' =>''];
    if(isset($_POST['submit'])){
        if(empty($_POST['email'])){
            $error['email'] = 'Vous devez entrer un email';
        }
        else{
            $email = $_POST['email'];
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $error['email'] = 'Votre email doit être une adresse email valide';
            }
        }
        if(!array_filter($error)){
            $email = $_POST["email"];
            //Verify if email is already in database
            $result = mysqli_query($db,"SELECT * FROM newsletter WHERE email = '$email'");
            $matchFound = mysqli_num_rows($result) > 0? 'yes':'no';
            if($matchFound == 'yes'){
                $success = false;
                $content = 'Votre email a déjà été enregistré';
                header('Location: index.php#newsletter');
            }else{
                $email = mysqli_real_escape_string($db,$_POST['email']);
                $sql = "INSERT INTO newsletter(email) VALUES('$email')";
                if(mysqli_query($db,$sql)){
                    $success = true;
                    $content = 'Vous avez été ajouté(e) avec succès';
                    header('Location: index.php#newsletter');
                }
            }
        }
    }
    //Close connection
    mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>afriplace</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/script.js" defer></script>
</head>
<body>
     <!--Header section starts-->
     <div class="prez">
        <!--Header end-->
        <?php include('templates/header.php')?>
        <!--Header start-->
        <!--Page d'acceuil commence-->
        <div class="search_input">
            <section class="form_section">
                <div class="card_container">
                <!--Form starts-->
                <form action="searchpage.php" method="GET" class="form">
                    <div class="row">
                        <select name="type" id="" class="control">
                            <option value="Appartement">Appartement</option>
                            <option value="Maison">Maison</option> 
                            <option value="Terrain">Terrain</option>
                            <option value="Bureaux">Bureaux</option>
                            <option value="Tout">Tous nos biens</option>
                        </select>
                        <select name="action" id="" class="control">
                            <option value="rent">Louer</option>
                            <option value="buy">Acheter</option>
                            <option value="tout">Tout type</option>
                        </select>
                        <select name="place" class="control">
                            <option value="conakry">Conakry</option>
                            <option value="kindia">Kindia</option>
                            <option value="boké">Boké</option>
                            <option value="labé">Labé</option>
                            <option value="mamou">Mamou</option>
                            <option value="kankan">Kankan</option>
                            <option value="faranah">Faranah</option>
                            <option value="nzérékoré">N'Zérékoré</option>
                            <option value="tout">Toute la Guinée</option>
                        </select>
                        <button name="search" value="submit" class="form-control-button"><span>Cherche</span><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                  </form>
                  <!--Form ends-->
                </div>
            </section>
            </div>
            <!--Page d'acceuil finit-->
     </div>
   <!--Cartes de navigation commence-->
    <div class="nav">
        <section class="navigation">
            <h1 class="heading">Nos services</h1>
            <div class="navigation_container">
                <a href="searchpage.php?action=buy" class="noSelect">
                    <div class="box">
                        <img src="assets/buy.png">
                        <h3>Achetez une maison</h3>
                        <p>Placez votre confiance en nous pour trouver la maison de vos rêves</p>
                        <button>Cherchez des maisons</button>
                    </div>
                </a>
                <a href="searchpage.php?action=louer" class="noSelect">
                    <div class="box">
                        <img src="assets/rent.png">
                        <h3>Louez une maison</h3>
                        <p>Explorez notre catalogue d'appartements à louer en Guinée</p>
                        <button>Louez des biens</button>
                    </div>
                </a>
                <a href="user/userpage.php" class="noSelect">
                    <div class="box">
                        <img src="assets/sell.png">
                        <h3>Listez une maison</h3>
                        <p>Placez vos propriétés sur notre site en quelques clics</p>
                        <button>Listez des biens</button>
                    </div>
                </a>
            </div>
        </section>
    </div>
    <!--Cartes de navigation finissent-->
    <!--Nouveautés commencent-->
    <div class="nouv">
        <section class="listings">
            <h1 class="heading">Nouveautés</h1>
            <div class="listings_container">
                <div class="box">
                    <a href="viewproperty.php">
                        <div class="thumb">
                            <img src="assets/living.jpg">
                        </div>
                        <div class="info_container">
                            <h3 class="prix">230.000.000 GNF</h3>
                        <div class="flex_container">
                            <div class="flex">
                                <span><!--<i class="fas fa-map-marker-alt"></i>--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0, 0, 300,350"><g id="svgg"><path id="path0" d="M182.422 59.315 C 134.494 69.319,102.262 112.788,107.757 160.012 C 111.741 194.248,141.545 254.972,190.018 327.613 L 199.842 342.335 203.227 337.378 C 250.833 267.672,286.972 196.664,292.191 162.580 C 301.492 101.835,242.880 46.696,182.422 59.315 M210.156 101.591 C 247.465 109.777,261.872 155.348,235.910 183.051 C 208.562 212.232,160.123 198.586,151.861 159.375 C 144.750 125.629,176.460 94.198,210.156 101.591 " stroke="none" fill="#afa7a7" fill-rule="evenodd"></path></g></svg> Lambagny</span>
                                <span><!--<i class="fas fa-bed"></i>--><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><path d="M9.196 14.603h15.523v.027h1.995v10.64h-3.99v-4.017H9.196v4.017h-3.99V6.65h3.99v7.953zm2.109-1.968v-2.66h4.655v2.66h-4.655z" fill="#afa7a7"></path></svg> 2</span>
                                <span><!--<i class="fas fa-bath"></i>--><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><path d="M23.981 15.947H26.6v1.33a9.31 9.31 0 0 1-9.31 9.31h-2.66a9.31 9.31 0 0 1-9.31-9.31v-1.33h16.001V9.995a2.015 2.015 0 0 0-2.016-2.015h-.67c-.61 0-1.126.407-1.29.965a2.698 2.698 0 0 1 1.356 2.342H13.3a2.7 2.7 0 0 1 1.347-2.337 4.006 4.006 0 0 1 3.989-3.63h.67a4.675 4.675 0 0 1 4.675 4.675v5.952z" fill="#afa7a7"/></svg> 3</span>
                                <span><!--<i class="fas fa-square"></i>--><svg width="20" height="20"><rect y="6"height="14" width="16" fill="#afa7a7"></rect></svg> 750m<sup>2</sup></span>
                            </div>
                        </div>
                        <div class="text">
                            <h4>Apparts à louer</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla beatae, excepturi 
                            esse tempore officia ducimus consectetur debitis id harum culpa.</p>
                        </div>
                        </div>
                        <div class="btn">
                            <a href="viewproperty.php" class="btn">voir le bien</a>
                        </div>
                    </div>                
            </div>
            <div class="more">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="orange">
                <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M214.6 470.6c-12.5 12.5-32.8 12.5-45.3 0l-160-160c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 402.7 329.4 265.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3l-160 160zm160-352l-160 160c-12.5 12.5-32.8 12.5-45.3 0l-160-160c-12.5-12.5-12.5-32.8 
                0-45.3s32.8-12.5 45.3 0L192 210.7 329.4 73.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3z"/>
                </svg>
            </div>
        </section>
    </div>
    <!--Nouveautés finissent-->
    <!--Newsletter starts-->
    <section class="newsletter" id="newsletter">
        <form action="index.php" method="post">
            <div class="box">
                <h3>Abonnez vous à notre newsletter</h3>
                <p>Ne manquez pas nos nouvelles annonces</p>
                <div class="subbox">
                    <input type="email" class="mailbox" placeholder="Votre email" maxlength="30" name="email" autocomplete="off">
                    <button class="sub" name="submit">Inscrivez-moi</button>
                </div>
                <?php if($success){
                    echo '<div class="success">'.$content.'</div>';
                }else if(!$success && isset($_POST['submit'])){
                    echo '<div class="success">'.$content.'</div>'; 
                }
                ?>
            </div>
        </form>
    </section>
    <!--Newsletter ends-->
    <!--Stats start-->
    <section class="stats">
        <div class="cont">
            <div class="thumb">
                <a href="searchpage.php?type=maison">
                <div class="bgblack"></div>
                <div class="caption_container">
                    <div class="caption">
                        <h3>Maisons/Villa</h3>
                        <p>20 <span>biens</span></p>
                        <button>Explorez</button>
                    </div>
                </div>
                <img src="assets/maison.png">
                </a>
            </div>
            <div class="thumb">
                <a href="searchpage.php?type=appart">
                <div class="bgblack" ></div>
                <div class="caption_container">
                    <div class="caption">
                        <h3>Appartements</h3>
                        <p>20 <span>biens</span></p>
                        <button>Explorez</button>
                    </div>
                </div>
                <img src="assets/appart.jpg">
                </a>
            </div>
            <div class="thumb">
                <a href="searchpage.php?type=terrain">
                <div class="bgblack" ></div>
                <div class="caption_container">
                    <div class="caption">
                        <h3>Terrains</h3>
                        <p>20 <span>biens</span></p>
                        <button>Explorez</button>
                    </div>
                </div>
                <img src="assets/terrain.jpg">
                </a>
            </div>
            <div class="thumb">
                <a href="searchpage.php?type=bureaux">
                <div class="bgblack"></div>
                <div class="caption_container">
                    <div class="caption">
                        <h3>Bureaux</h3>
                        <p>20 <span>biens</span></p>
                        <button>Explorez</button>
                    </div>
                </div>
                <img src="assets/bureau.jpg">
                </a>
            </div>
        </div>
    </section>
    <!--Stats end-->
    <!--footer starts-->
    <?php include('templates/footer.php')?>
    <!--footer end-->
</body>
</html>
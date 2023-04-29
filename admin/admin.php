<?php
    include('../config/connection.php');
    //Properties
    $propertiesQuery = "SELECT * FROM properties";
    $propertiesResult = mysqli_query($db,$propertiesQuery);
    $totalProperties = mysqli_num_rows($propertiesResult);

    //Users
    $usersQuery = "SELECT * FROM users";
    $usersResult = mysqli_query($db,$usersQuery);
    $totalUsers = mysqli_num_rows($usersResult);
    //Newsletter
    $newsletterQuery = "SELECT * FROM newsletter";
    $newslettterResult = mysqli_query($db,$newsletterQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin_style.css">
    <script src="admin_script.js" defer></script>
    <style>
    .userpage .title{
        font-size: 35px;
        margin: 20px 0; 
    }
    .userpage h1{
        margin:20px 0;
        font-size: 26px;
    }
    .userpage .stat_page h3{
        color: gray;
    }
    .userpage .stat_page h4{
        color: gray;
    }
    .userpage .stats{
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        justify-content: space-around;
        text-align: center;
        width: 100%;
        margin-bottom:30px;
    }
    .userpage .stats .column{
        padding: 8px;
        width: 120px;
        height: 100px;
        box-shadow: rgb(0 0 0 / 30%) 0px 2px 4px 0px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .userpage .stats .column label{
        font-size: 40px;
    }
    /*Card/Column*/
    .column{
        cursor: pointer;
    }
    /*Other statistiques start*/
    .userpage h2{
        margin: 20px 0;
        font-size: 21px;
        color: #6d6d6e;
    }
    .userpage .sub_stats{
        display: grid;
        grid-template-columns: repeat(auto-fit,136px);
        width: 100%;
        justify-content: space-around;
        gap: 40px;
    }
    .userpage .sub_stats .column{
        padding: 8px;
        width: 120px;
        height: 100px;
        text-align: center;
        box-shadow: rgb(0 0 0 / 30%) 0px 2px 4px 0px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .userpage .sub_stats label{
        font-size: 35px;
    }
    .userpage .sub_stats .line{
        height: 5px;
        width: 100%;
        background-color: black;
        margin-top: 20px;
    }
    #facebook .line{
        background-color: darkblue;
    }
    #instagram .line{
        background-color: rgb(204, 6, 161);
    }
    #twitter .line{
        background-color: rgb(0, 140, 255);
    }
    #youtube .line{
        background-color: rgb(255, 0, 0);
    }
    /*Other statistiques end*/
    .userpage .column img{
        display: block;
        height: 40px;
        width: 40px;
        margin: 0 auto;
    }
    .userpage .new_listings_title{
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 20px ;
    }
    .userpage .new_listings_title h1{
        margin: 0;
    }
    .userpage .new_listings_title svg{
        height: 30px;
        width: 30px;
        cursor: pointer;
    }
    .userpage .property_box button{
        padding: 30px 10px 0px;
    }
    .userpage .property_box button svg{
        margin: auto 0;
        height: 30px;
        width: 30px;
    }
    /*Admin page end*/
    </style>
</head>
<body>
    <?php include('../templates/admin_templates.php')?>
        <div class="userpage">
            <div class="title">Hello Admin</div>
            <div class="stat_page">
                <div class="stats">
                    <div class="column">
                        <label for="" id="daily_visits" class="stat">0</label>
                        <h3>Visits</h3>
                    </div>
                    <div class="column">
                        <label for="" id="current_visits" class="stat">0</label>
                        <h3>Properties</h3>
                    </div>
                    <div class="column">
                        <label id="daily_signups" class="stat">0</label>
                        <h3>Users</h3>
                    </div>
                    <div class="column">
                        <label class="stat">0</label>
                        <h3>Revenue</h3>
                    </div>
                </div>
                <div class="graph">

                </div>
                <div class="monthly_stats">
                    <h2>Ce mois-ci</h2>
                    <div class="sub_stats">
                        <div class="column">
                            <label for="" class="stat">0</label>
                            <h3>Visits</h3>
                        </div>
                        <div class="column">
                            <label class="stat">0</label>
                            <h3>Properties</h3>
                        </div>
                        <div class="column">
                            <label class="stat">0</label>
                            <h3>Users</h3>
                        </div>
                        <div class="column">
                            <label class="stat">0</label>
                            <h3>Revenue</h3>
                        </div>
                    </div>
                </div>
                <div class="total_stats">
                    <h2>Total</h2>
                    <div class="sub_stats">
                        <div class="column">
                            <label for="" class="stat">0</label>
                            <h3>Visits</h3>
                        </div>
                        <div class="column">
                            <label class="stat"><?php echo mysqli_num_rows($propertiesResult)?></label>
                            <h3>Properties</h3>
                        </div>
                        <div class="column">
                            <label class="stat"><?php echo mysqli_num_rows($usersResult)?></label>
                            <h3>Users</h3>
                        </div>
                        <div class="column">
                            <label class="stat">0</label>
                            <h3>Revenue</h3>
                        </div>
                        <div class="column">
                            <label class="stat"><?php echo mysqli_num_rows($newslettterResult)?></label>
                            <h3>Newsletter sub</h3>
                        </div>
                        <div class="column" id="facebook">
                            <label class="stat">0</label>
                            <h3>Facebook</h3>
                            <div class="line"></div>
                        </div>
                        <div class="column" id="instagram">
                            <label class="stat">0</label>
                            <h3>Instagram</h3>
                            <div class="line"></div>
                        </div>
                        <div class="column" id="twitter">
                            <label class="stat">0</label>
                            <h3>Twitter</h3>
                            <div class="line"></div>
                        </div>
                        <div class="column" id="youtube">
                            <label class="stat">0</label>
                            <h3>Twitter</h3>
                            <div class="line"></div>
                        </div>
                        <div class="column">
                            <img src="../assets/house_img.png">
                            <h4>Maisons</h4>
                            <label for="" id="num_houses" class="stat">0</label>
                        </div>
                        <div class="column">
                            <img src="../assets/house_img.png">
                            <h4>Apparts</h4>
                            <label for="" id="num_apparts" class="stat">0</label>
                        </div>
                        <div class="column">
                            <img src="../assets/house_img.png">
                            <h4>Terrains</h4>
                            <label for="" id="num_terrains" class="stat">0</label>
                        </div>
                        <div class="column">
                            <img src="../assets/house_img.png">
                            <h4>Bureaux</h4>
                            <label for="" id="num_bureaux" class="stat">0</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="new_listings_title">
                <h1>Nouveautés</h1>
                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-plus">
                    <path fill-rule="evenodd" d="M7.75 2a.75.75 0 01.75.75V7h4.25a.75.75 0 110 1.5H8.5v4.25a.75.75 0 11-1.5 
                    0V8.5H2.75a.75.75 0 010-1.5H7V2.75A.75.75 0 017.75 2z">
                    </path>
                </svg>
            </div>
            <div class="new_listings">
                <ul class="property_list">
                    <li>
                        <div class="property_box">
                            <a href="property.html">
                                <img src="../assets/living.jpg">
                                <div class="property_info">
                                    <div class="property_stats">
                                        <!--Location-->
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0, 0, 300,350">
                                                <g id="svgg">
                                                    <path id="path0" d="M182.422 59.315 C 134.494 69.319,102.262 112.788,107.757 160.012 C 111.741 194.248,141.545 254.972,190.018 
                                                    327.613 L 199.842 342.335 203.227 337.378 C 250.833 267.672,286.972 196.664,292.191 162.580 C 301.492 101.835,242.880 46.696,
                                                    182.422 59.315 M210.156 101.591 C 247.465 109.777,261.872 155.348,235.910 183.051 C 208.562 212.232,160.123 198.586,151.861 
                                                    159.375 C 144.750 125.629,176.460 94.198,210.156 101.591 " stroke="none" fill="#afa7a7" fill-rule="evenodd">
                                                    </path>
                                                </g>
                                            </svg> Lambagny
                                        </span>
                                        <!--Beds-->
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 25">
                                                <path d="M9.196 14.603h15.523v.027h1.995v10.64h-3.99v-4.017H9.196v4.017h-3.99V6.65h3.99v7.953zm2.109-1.968v-2.66h4.655v2.66h-4.655z" 
                                                fill="#afa7a7">
                                                </path>
                                            </svg> 2
                                        </span>
                                        <!--Baths-->
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25">
                                                <path d="M23.981 15.947H26.6v1.33a9.31 9.31 0 0 1-9.31 9.31h-2.66a9.31 9.31 0 0 1-9.31-9.31v-1.33h16.001V9.995a2.015 
                                                2.015 0 0 0-2.016-2.015h-.67c-.61 0-1.126.407-1.29.965a2.698 2.698 0 0 1 1.356 2.342H13.3a2.7 2.7 0 0 1 1.347-2.337 
                                                4.006 4.006 0 0 1 3.989-3.63h.67a4.675 4.675 0 0 1 4.675 4.675v5.952z" fill="#afa7a7">
                                                </path></svg> 3
                                        </span>
                                        <!--Surface-->
                                        <span>
                                            <svg width="20" height="20">
                                                <rect y="6" height="14" width="16" fill="#afa7a7"></rect>
                                            </svg> 750m<sup>2</sup>
                                        </span>
                                    </div>
                                    <h4>Titre</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                    Eligendi veniam sunt ipsum repudiandae labore aut magnam temporibus earum 
                                    dignissimos fuga!</p>
                                </div>
                            </a>
                            <button>
                                ⋮
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 25 25">
                                    <path fill="currentColor" d="m13.06 12.15 5.02-5.03a.75.75 0 1 0-1.06-1.06L12 11.1 
                                    6.62 5.7a.75.75 0 1 0-1.06 1.06l5.38 5.38-5.23 5.23a.75.75 0 1 0 1.06 1.06L12 13.2l4.88 
                                    4.87a.75.75 0 1 0 1.06-1.06l-4.88-4.87z"></path></svg> -->
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</body>
</html>
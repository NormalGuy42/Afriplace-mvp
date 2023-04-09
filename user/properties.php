<?php include('../config/connection.php')?>
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
            <h1 class="title">Liste de propriétés</h1>
            <div class="line"></div>
            <div class="properties">
                <div class="properties_container">
                    <div class="property_box">
                        <a href="property_page.php?id=">
                        <img src="../assets/new-living.jpg">
                        <div class="outer_stats">
                            <div class="stats_container">
                                <div class="stat">
                                    <img src="../assets/eye.svg" alt="">
                                    <label for="">400</label>
                                </div>
                                <div class="stat">
                                    <img src="../assets/arrow-pointer.svg" alt="">
                                    <label for="">400</label>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <h3>230.000.000 GNF</h3>
                        </div>
                        <div class="flex_container">
                            <div class="flex">
                                <span><!--<i class="fas fa-map-marker-alt"></i>-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0, 0, 300,350">
                                        <g id="svgg">
                                            <path id="path0" d="M182.422 59.315 C 134.494 69.319,102.262 112.788,107.757 160.012 C 111.741 194.248,141.545 254.972,190.018 
                                            327.613 L 199.842 342.335 203.227 337.378 C 250.833 267.672,286.972 196.664,292.191 162.580 C 301.492 101.835,242.880 46.696,
                                            182.422 59.315 M210.156 101.591 C 247.465 109.777,261.872 155.348,235.910 183.051 C 208.562 212.232,160.123 198.586,151.861 
                                            159.375 C 144.750 125.629,176.460 94.198,210.156 101.591 " stroke="none" fill="#afa7a7" fill-rule="evenodd">
                                            </path>
                                        </g>
                                    </svg> Lambagny</span>
                                <span><!--<i class="fas fa-bed"></i>-->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 25">
                                        <path d="M9.196 14.603h15.523v.027h1.995v10.64h-3.99v-4.017H9.196v4.017h-3.99V6.65h3.99v7.953zm2.109-1.968v-2.66h4.655v2.66h-4.655z" fill="#afa7a7">
                                        </path>
                                    </svg> 2</span>
                                <span><!--<i class="fas fa-bath"></i>-->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25">
                                        <path d="M23.981 15.947H26.6v1.33a9.31 9.31 0 0 1-9.31 9.31h-2.66a9.31 9.31 0 0 1-9.31-9.31v-1.33h16.001V9.995a2.015 
                                        2.015 0 0 0-2.016-2.015h-.67c-.61 0-1.126.407-1.29.965a2.698 2.698 0 0 1 1.356 2.342H13.3a2.7 2.7 0 0 1 1.347-2.337 
                                        4.006 4.006 0 0 1 3.989-3.63h.67a4.675 4.675 0 0 1 4.675 4.675v5.952z" fill="#afa7a7">
                                        </path></svg> 3</span>
                                <span><!--<i class="fas fa-square"></i>-->
                                    <svg width="20" height="20">
                                        <rect y="6" height="14" width="16" fill="#afa7a7"></rect>
                                    </svg> 750m<sup>2</sup></span>
                            </div>
                        </div>
                        <h4>Apparts à louer</h4>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam corporis dolores maiores quod animi repellendus esse tempora non quas aspernatur, quos voluptatibus fugit cupiditate eligendi nulla libero. Quod, quis necessitatibus.
                        </p>
                        <div class="btn_container">
                            <button>Voir plus</button>
                        </div>
                    </a>
                    </div>
                </div>
                </div>
            </div>
    </div>
</body>
</html>
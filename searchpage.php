<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/searchpage.css">
</head>
<body>
    <!--Header end-->
    <?php include('templates/header.php')?>
    <!--Header start-->
    <section>
        <div class="tab">
            <input type="text" class="search_field">
           <div class="tab_index home_type" id="home_type">
            <button class="search_btn home_type" onclick="toggleHome()">
                <div class="btn_description">
                    <div>Appart</div>
                    <div><svg role="img" aria-label="" aria-hidden="true" class="svg" viewBox="0 0 30 28" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.961 18.183l7.056-7.147 1.893 1.868-8.951 9.068-8.927-9.069 1.896-1.866z" fill="black">
                        </path>
                    </svg>
                    </div>
                </div>
            </button>
            <section class="dialog home_type" id="home_section">
                <form>
                    <div class="dialog_header">Type d'habitat</div>
                    <div id="homeInput">
                        <ul class="dialog_list">
                            <li><div><input type="checkbox"><label>Appart</label></div></li>
                            <li><div><input type="checkbox"><label>Maison</label></div></li>
                            <li><div><input type="checkbox"><label>Terrain</label></div></li>
                            <li><div><input type="checkbox"><label>Bureaux</label></div></li>
                            <li><div><input type="checkbox"><label>Tout</label></div></li>
                        </ul>
                    </div>
                    <div class="apply_container"><button class="apply_btn">Appliquer</button></div>
                </form>
            </section>
           </div>
           <div class="tab_index action_type" id="action_type">
                <button class="search_btn action_type" onclick="toggleAction()"> 
                    <div class="btn_description">
                        <div>Louer</div>
                        <div><svg role="img" aria-label="" aria-hidden="true" class="svg" viewBox="0 0 30 28" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.961 18.183l7.056-7.147 1.893 1.868-8.951 9.068-8.927-9.069 1.896-1.866z" fill="black">
                                </path>
                            </svg>
                        </div>                    
                    </div>
                </button>
                <section class="dialog home_type" id="action_section">
                    <div class="dialog_header">Type</div>
                    <form action="">
                        <div id="actionInput">
                            <ul class="dialog_list">
                                <li><input type="radio" name="home_type" value="louer"><label>Louer</label></li>
                                <li><input type="radio" name="home_type" value="acheter"><label>Acheter</label></li>
                                <li><input type="radio" name="home_type" value="les_deux"><label>Les deux</label></li>
                            </ul>
                        </div>
                        <div class="apply_container"><button class="apply_btn">Appliquer</button></div>
                    </form>
                </section>
           </div>
           <div class="tab_index prix" id="prix">
                <button class="search_btn price_range" onclick="togglePrice()"> 
                    <div class="btn_description">
                        <div>Prix</div>
                        <div><svg role="img" aria-label="" aria-hidden="true" class="svg" viewBox="0 0 30 28" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.961 18.183l7.056-7.147 1.893 1.868-8.951 9.068-8.927-9.069 1.896-1.866z" fill="black">
                                </path>
                            </svg>
                        </div>
                    </div>
                </button>
                <section class="dialog price_range" id="price_section">
                        <div class="dialog_header">Prix</div>
                        <form action="" class="price_input">
                            <div id="priceInput">
                                <div class="input_group">
                                    <div class="input_row">
                                        <input class="input_field" placeholder="Prix min">
                                    </div>
                                    <div class="sep"><span>-</span></div>
                                    <div class="input_row">
                                        <input class="input_field" placeholder="Prix max">
                                    </div>  
                                </div>
                            </div>
                        <div class="apply_container"><button class="apply_btn">Appliquer</button></div>
                        </form>
                    </section>
           </div>
            <div class="tab_index filter" id="filter">
                <button class="search_btn filter" onclick="toggleFilter()">
                    <div class="btn_description">
                        <div>Filtrer</div>
                        <div><svg role="img" aria-label="" aria-hidden="true" class="svg" viewBox="0 0 30 28" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.961 18.183l7.056-7.147 1.893 1.868-8.951 9.068-8.927-9.069 1.896-1.866z" fill="black">
                                </path>
                            </svg>
                        </div>
                    </div>
                </button>
                <section class="dialog filter" id="filter_section">
                    <form class="option_container">
                        <div class="dialog_header">
                            Filtres
                            <div class="svg_container">
                                <svg onclick ="toggleFilter()"viewBox="0 0 20 20" class="return"xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.8 11.8L4 4l7.8 7.8L4 19.6l7.8-7.8zm0 0l7.8 7.8-7.8-7.8L19.6 4l-7.8 7.8z" stroke="black" 
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                        </div>
                        <div id="filter_input">
                            <div class="option home">
                                <label>Type de bien</label>
                                <ul class="dialog_list">
                                    <li><div><input type="checkbox"><label>Appart</label></div></li>
                                    <li><div><input type="checkbox"><label>Maison</label></div></li>
                                    <li><div><input type="checkbox"><label>Terrain</label></div></li>
                                    <li><div><input type="checkbox"><label>Bureaux</label></div></li>
                                    <li><div><input type="checkbox"><label>Tout</label></div></li>
                                </ul>
                            </div>
                            <div class="option action">
                                <label>Type d'action</label>
                                <ul class="dialog_list">
                                    <li><input type="radio" name="home_type" value="louer"><label>Louer</label></li>
                                    <li><input type="radio" name="home_type" value="acheter"><label>Acheter</label></li>
                                    <li><input type="radio" name="home_type" value="les_deux"><label>Les deux</label></li>
                                </ul>
                            </div>
                            <div class="option price">
                                <label>Prix</label>
                                <div class="input_group">
                                    <div class="input_row">
                                        <input class="input_field" placeholder="Prix min">
                                    </div>
                                    <div class="sep"><span>-</span></div>
                                    <div class="input_row">
                                        <input class="input_field" placeholder="Prix max">
                                    </div>  
                                </div>
                            </div>
                            <div class="option">
                                <label for="">Lits</label>
                                <div class="room_row">
                                    <button type="button">Tout</button>
                                    <button type="button">1</button>
                                    <button type="button">2</button>
                                    <button type="button">3</button>
                                    <button type="button">4</button>
                                    <button type="button">5+</button>
                                </div>
                            </div>
                            <div class="option">
                                <label>Toilettes</label>
                                <div class="room_row" id="tlts_selector"> 
                                    <button type="button">Tout</button>
                                    <button type="button">1</button>
                                    <button type="button">2</button>
                                    <button type="button">3</button>
                                    <button type="button">4</button>
                                    <button type="button">5+</button>
                                </div>
                            </div>
                            <div class="option">
                                <label>Surface</label>
                                <div class="input_group">
                                    <div class="input_row">
                                        <input class="input_field" placeholder="Surface min">
                                    </div>
                                    <div class="sep"><span>-</span></div>
                                    <div class="input_row">
                                        <input class="input_field" placeholder="Surface max">
                                    </div>  
                            </div>
                            </div>
                            <div class="option">
                                <label>Installations</label>
                                <ul>
                                    <li><input type="checkbox">Meublé</li>
                                    <li><input type="checkbox">Non-Meublé</li>
                                    <li><input type="checkbox">Climatisation</li>
                                    <li><input type="checkbox">Gardiens</li>
                                    <li><input type="checkbox">Machine à laver</li>
                                    <li><input type="checkbox">Piscine</li>
                                    <li><input type="checkbox">Parking</li>
                                    <li><input type="checkbox">Groupe Electrogène</li>
                                </ul>
                            </div>
                        </div>
                    </form>
                    <div class="apply_container"><button class="apply_btn">Appliquer</button></div>
                </section>
            </div>
            <!-- <div class="tab_index mobile_filter">
                <a href="mobile_filter.html">
                    <button class="search_btn filter">
                        <div class="btn_description">
                            <div>Filtrer</div>
                            <div><svg role="img" aria-label="" aria-hidden="true" class="svg" viewBox="0 0 30 28" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.961 18.183l7.056-7.147 1.893 1.868-8.951 9.068-8.927-9.069 1.896-1.866z" fill="black">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </button>
                </a>
            </div> -->
        </div>
        <div class="searchresults_container">
            <div class="searchresults_header">
                <!--Lieu + Type + Bien-->
                <h1 id="results_title">Apparts à Louer à Lambagny</h1>
                <!--Nombre de résultats-->
                <span id="results_num">500 résultats</span>
            </div>
            <div class="searchresults_grid">
                <ul class="searchresults_list">
                    <li>
                        <div class="result_box">
                            <a href="viewproperty.php" class="result_link">
                                <div class="thumb">
                                    <img src="assets/living.jpg" class="">
                                </div>
                                <div class="info_container">
                                    <h3 class="prix">230.000.000 GNF</h3>
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
                                                    <path d="M9.196 14.603h15.523v.027h1.995v10.64h-3.99v-4.017H9.196v4.017h-3.99V6.65h3.99v7.953zm2.109-1.968v-2.66h4.655v2.66h-4.655z" 
                                                    fill="#afa7a7">
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
                                    <div class="text">
                                        <h4>Apparts à louer</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla beatae, excepturi
                                            esse tempore officia ducimus consectetur debitis id harum culpa.</p>
                                    </div>
                                </div>
                                <div class="btn search">
                                    <a href="viewproperty.php" class="btn">voir le bien</a>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="result_box">
                            <a href="viewproperty.html" class="result_link">
                                <div class="thumb">
                                    <img src="assets/living.jpg" class="">
                                </div>
                                <div class="info_container">
                                    <h3 class="prix">230.000.000 GNF</h3>
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
                                                    <path d="M9.196 14.603h15.523v.027h1.995v10.64h-3.99v-4.017H9.196v4.017h-3.99V6.65h3.99v7.953zm2.109-1.968v-2.66h4.655v2.66h-4.655z" 
                                                    fill="#afa7a7">
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
                                    <div class="text">
                                        <h4>Apparts à louer</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla beatae, excepturi
                                            esse tempore officia ducimus consectetur debitis id harum culpa.</p>
                                    </div>
                                </div>
                                <div class="btn search">
                                    <a href="viewproperty.php" class="btn">voir le bien</a>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="result_box">
                            <a href="viewproperty.php" class="result_link">
                                <div class="thumb">
                                    <img src="assets/living.jpg" class="">
                                </div>
                                <div class="info_container">
                                    <h3 class="prix">230.000.000 GNF</h3>
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
                                                    <path d="M9.196 14.603h15.523v.027h1.995v10.64h-3.99v-4.017H9.196v4.017h-3.99V6.65h3.99v7.953zm2.109-1.968v-2.66h4.655v2.66h-4.655z" 
                                                    fill="#afa7a7">
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
                                    <div class="text">
                                        <h4>Apparts à louer</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla beatae, excepturi
                                            esse tempore officia ducimus consectetur debitis id harum culpa.</p>
                                    </div>
                                </div>
                                <div class="btn search">
                                    <a href="viewproperty.php" class="btn">voir le bien</a>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="result_box">
                            <a href="viewproperty.php" class="result_link">
                                <div class="thumb">
                                    <img src="assets/living.jpg" class="">
                                </div>
                                <div class="info_container">
                                    <h3 class="prix">230.000.000 GNF</h3>
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
                                                    <path d="M9.196 14.603h15.523v.027h1.995v10.64h-3.99v-4.017H9.196v4.017h-3.99V6.65h3.99v7.953zm2.109-1.968v-2.66h4.655v2.66h-4.655z" 
                                                    fill="#afa7a7">
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
                                    <div class="text">
                                        <h4>Apparts à louer</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla beatae, excepturi
                                            esse tempore officia ducimus consectetur debitis id harum culpa.</p>
                                    </div>
                                </div>
                                <div class="btn search">
                                    <a href="viewproperty.html" class="btn">voir le bien</a>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="searchresult_pagination">
                <ul>
                    <li>
                        <a>
                            <svg viewBox="0 0 32 32" class="chevron left" aria-hidden="true" 
                            focusable="false" role="img"><title>Chevron Left</title>
                            <path stroke="none" d="M29.41 8.59a2 2 0 00-2.83 0L16 19.17 5.41 8.59a2 2 0 00-2.83 
                            2.83l12 12a2 2 0 002.82 0l12-12a2 2 0 00.01-2.83z"></path></svg>
                        </a>
                    </li>
                    <li data-active="true">1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>
                        <a>
                            <svg viewBox="0 0 32 32" 
                            class="chevron right" 
                            aria-hidden="true" focusable="false" role="img"><title>Chevron Right</title>
                            <path stroke="none" d="M29.41 8.59a2 2 0 00-2.83 0L16 19.17 5.41 8.59a2 2 0 00-2.83 2.83l12 
                            12a2 2 0 002.82 0l12-12a2 2 0 00.01-2.83z"></path></svg>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- <div class="no_results">
                <img src="assets/sad_emoji.svg">
                <div class="p-container">
                    <p>Pas de résultats</p>
                    <p>Changer les paramètres de recherche pour trouver des résultats</p>
                </div>
            </div> -->
        </div>
    </section>
    <!--Footer start-->
    <?php include('templates/footer.php')?>
    <!--Footer end-->
    <script src="scripts/script.js"></script>
    <script defer>
        //When user clicks outside menu closes
        //Fix this it's not good
        document.addEventListener('click',function(e){
        var nav_list = document.querySelector('.nav_ul');
        var dialogHome = document.getElementById('home_section');
        var dialogAction = document.getElementById('action_section');
        var dialogPrice = document.getElementById('price_section')
        var dialogFilter = document.getElementById('filter_section')
        
        if(!e.target.closest('#home_type') && dialogHome.classList.contains('show') ){ 
            dialogHome.classList.remove('show');
        }
        else if(!e.target.closest('#action_type') && dialogAction.classList.contains('show')){
            dialogAction.classList.remove('show');
        }
        else if(!e.target.closest('#prix') && dialogPrice.classList.contains('show')){
            dialogPrice.classList.remove('show');
        }
        else if(!e.target.closest('#filter') && dialogFilter.classList.contains('show')){
            dialogFilter.classList.remove('show');
        }  
        })
        //Filter Button start
        //Acivate room filter button on click start
        //Bedroom
        function activateBedButton(){
        const rooms = document.querySelector('.room_row');
        const roomBtn = rooms.querySelectorAll('button');
        roomBtn.forEach(button =>{
            button.addEventListener('click',()=>{
            if(!button.dataset.active){
            button.dataset.active = true;
            }
            else if(button.dataset.active = true){
                delete button.dataset.active;
            }
            })
        })
        }
        //Bathroom
        function activateBathButton(){
        const rooms = document.querySelector('#tlts_selector');
        const roomBtn = rooms.querySelectorAll('button');
        roomBtn.forEach(button =>{
            button.addEventListener('click',()=>{
            if(!button.dataset.active){
            button.dataset.active = true;
            }
            else if(button.dataset.active = true){
                delete button.dataset.active;
            }
            })
        })
        }
        activateBedButton();
        activateBathButton();
        //Acivate room filter button on click end
        //Filter Button end
    </script>
</body>
</html>
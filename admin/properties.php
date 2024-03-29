<?php
    include('../config/connection.php');
    $sql = "SELECT * FROM properties";
    $properties = mysqli_query($db,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties</title>
    <link rel="stylesheet" href="admin_style.css">
    <script src="admin_script.js" defer></script>
    <style>
        .title h3{
            font-size: 25px;
        }
        ul.property_list{
            margin-bottom: 30px;
        }
        .property_box .property_info{
            width: 82%;
            overflow: hidden;      
        }
        
    </style>
</head>
<body>
    <?php include('../templates/admin_templates.php')?>
        <div class="property_section">
            <div class="property_container">
                <div class="title">
                    <h3>Properties: <span><?php echo mysqli_num_rows($properties)?><span></h3>
                    <!-- <svg role="img" aria-label="" aria-hidden="true" class="svg" viewBox="0 2 30 28" 
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.961 18.183l7.056-7.147 1.893 1.868-8.951 9.068-8.927-9.069 1.896-1.866z" 
                        fill="black"></path>
                    </svg> -->
                </div>
                <!--Search-->
                <div class="advanced_search">
                    <input type="text" placeholder="Enter id">
                    <div class="filter">
                        <button class="filterBtn">
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
                        <section class="filterSection">
                            <div class="flex">
                                <input type="checkbox">
                                Maisons
                            </div>
                            <div class="flex">
                                <input type="checkbox">
                                Apparts
                            </div>
                            <div class="flex">
                                <input type="checkbox">
                                Terrains
                            </div>
                            <div class="flex">
                                <input type="checkbox">
                                Bureaux
                            </div>
                        </section>
                    </div>
                </div>
                <ul class="property_list">
                <?php foreach($properties as $property):?>
                    <li>
                        <div class="property_box">
                            <a href="property.php?location=properties.php&id=<?php echo $property['id']?>">
                                <img src="
                                <?php
                                    $images = explode(',',$property['images']);
                                    echo htmlspecialchars('../'.$images[0]);
                                ?>
                                ">
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
                                            </svg> <?php echo $property['quartier']?>
                                        </span>
                                       <?php if($property['type']=="Maison" or $property['type']=="Appart"):?>
                                             <!--Beds-->
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 25">
                                                    <path d="M9.196 14.603h15.523v.027h1.995v10.64h-3.99v-4.017H9.196v4.017h-3.99V6.65h3.99v7.953zm2.109-1.968v-2.66h4.655v2.66h-4.655z" 
                                                    fill="#afa7a7">
                                                    </path>
                                                </svg> <?php echo $property['bedNum']?>
                                            </span>
                                            <!--Baths-->
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25">
                                                    <path d="M23.981 15.947H26.6v1.33a9.31 9.31 0 0 1-9.31 9.31h-2.66a9.31 9.31 0 0 1-9.31-9.31v-1.33h16.001V9.995a2.015 
                                                    2.015 0 0 0-2.016-2.015h-.67c-.61 0-1.126.407-1.29.965a2.698 2.698 0 0 1 1.356 2.342H13.3a2.7 2.7 0 0 1 1.347-2.337 
                                                    4.006 4.006 0 0 1 3.989-3.63h.67a4.675 4.675 0 0 1 4.675 4.675v5.952z" fill="#afa7a7">
                                                    </path></svg> <?php echo $property['toiletteNum']?>
                                            </span>
                                       <?php endif?>
                                        <!--Surface-->
                                        <span>
                                            <svg width="20" height="20">
                                                <rect y="6" height="14" width="16" fill="#afa7a7"></rect>
                                            </svg> <?php echo $property['surface']?>m<sup>2</sup>
                                        </span>
                                    </div>
                                    <h4><?php echo $property['title']?></h4>
                                    <div><?php echo $property['type'] ?></div>
                                    <p><?php echo $property['description']?></p>
                                </div>
                            </a>
                            <button  class="more_actions">⋮</button>
                            <div class="btn_section">
                                <label>Delete</label>
                                <label>Hide</label>
                            </div>
                        </div>
                    </li>
                <?php endforeach?>
                </ul>
            </div>
        </div>
    </section>
</body>
</html>
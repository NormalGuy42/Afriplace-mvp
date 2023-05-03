<?php 
    include('../config/connection.php');
    include('../templates/get_user_id.php');
    //Get properties
    $userID = mysqli_real_escape_string($db,$id);
    $propertiesSql = "SELECT * FROM properties WHERE `userID`= '$userID'";
    $properties = mysqli_query($db,$propertiesSql);

?>
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
    <style>
        h2{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!--Header-->
    <?php include('../templates/user_header.php')?>
    <!--Header-->
        <div class="userpage_content">
            <h1 class="title">Liste de propriétés</h1>
            <div class="line"></div>
            <div class="properties" oncontextmenu = "return false;">
            <div class="properties_container">
                    <?php if(mysqli_num_rows($properties)>0):?>
                        <?php foreach($properties as $property):?>
                        <div class="property_box" data-long="true">
                        <div class="bubble_container">
                        </div>
                        <a href="property_page.php?location=properties.php&id=<?php echo htmlspecialchars($property['id'])?>">
                            <?php if ($property['statut'] != "online"):?>
                                <div class="container">
                                    <div class="removedOverlay">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="hide">
                                                <path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 
                                                25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 
                                                79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 
                                                68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 
                                                149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 
                                                48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 
                                                4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 
                                                13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 
                                                10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 
                                                220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 
                                                239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z">
                                                </path>
                                            </svg>
                                        </div>
                                    <img src="
                                    <?php
                                        $images = explode(',',$property['images']);
                                        echo htmlspecialchars('../'.$images[0]);
                                    ?>
                                    ">
                            </div>
                            <?php endif?>
                            <?php if($property['statut'] == "online"):?>
                                <img src="
                                <?php
                                    $images = explode(',',$property['images']);
                                    echo htmlspecialchars('../'.$images[0]);
                                ?>
                                ">
                            <?php endif?>
                            <div class="outer_stats">
                                <div class="stats_container">
                                    <div class="stat">
                                        <img src="../assets/message2.svg" alt="">
                                        <label for=""><?php echo htmlspecialchars(strval($property['messages']))?></label>
                                    </div>
                                    <div class="stat">
                                        <img src="../assets/eye.svg" alt="">
                                        <label for=""><?php echo htmlspecialchars(strval($property['views']))?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <h3><span class="priceValue"><?php echo htmlspecialchars($property['price'])?></span> GNF</h3>
                            </div>
                            <div class="flex_container">
                                <div class="flex">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0, 0, 300,350">
                                            <g id="svgg">
                                                <path id="path0" d="M182.422 59.315 C 134.494 69.319,102.262 112.788,107.757 160.012 C 111.741 194.248,141.545 254.972,190.018 
                                                327.613 L 199.842 342.335 203.227 337.378 C 250.833 267.672,286.972 196.664,292.191 162.580 C 301.492 101.835,242.880 46.696,
                                                182.422 59.315 M210.156 101.591 C 247.465 109.777,261.872 155.348,235.910 183.051 C 208.562 212.232,160.123 198.586,151.861 
                                                159.375 C 144.750 125.629,176.460 94.198,210.156 101.591 " stroke="none" fill="#afa7a7" fill-rule="evenodd">
                                                </path>
                                            </g>
                                        </svg><?php echo htmlspecialchars($property['quartier'])?></span>
                                    <?php 
                                        $houses = ['Maison','Appart'];
                                        if(in_array($property['type'],$houses)):
                                    ?>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 25">
                                            <path d="M9.196 14.603h15.523v.027h1.995v10.64h-3.99v-4.017H9.196v4.017h-3.99V6.65h3.99v7.953zm2.109-1.968v-2.66h4.655v2.66h-4.655z" fill="#afa7a7">
                                            </path>
                                        </svg><?php echo htmlspecialchars($property['bedNum'])?>
                                    </span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25">
                                            <path d="M23.981 15.947H26.6v1.33a9.31 9.31 0 0 1-9.31 9.31h-2.66a9.31 9.31 0 0 1-9.31-9.31v-1.33h16.001V9.995a2.015 
                                            2.015 0 0 0-2.016-2.015h-.67c-.61 0-1.126.407-1.29.965a2.698 2.698 0 0 1 1.356 2.342H13.3a2.7 2.7 0 0 1 1.347-2.337 
                                            4.006 4.006 0 0 1 3.989-3.63h.67a4.675 4.675 0 0 1 4.675 4.675v5.952z" fill="#afa7a7">
                                            </path></svg><?php echo htmlspecialchars($property['toiletteNum'])?>
                                    </span>
                                    <?php endif ?>
                                    <span>
                                        <svg width="20" height="20">
                                            <rect y="6" height="14" width="16" fill="#afa7a7"></rect>
                                        </svg> <?php echo htmlspecialchars($property['surface'])?>m<sup>2</sup></span>
                                </div>
                            </div>
                            <h4><?php echo htmlspecialchars($property['title'])?></h4>
                            <p>
                                <?php echo htmlspecialchars($property['description'])?>
                            </p>
                            <div class="btn_container">
                                <button class="voir">Voir plus</button>
                            </div>
                        </a>
                    </div>
                        <?php endforeach?>
                    <?php endif?>
                    <?php if(mysqli_num_rows($properties)<=0):?>
                        <div class="noproperty">
                            <div>Auncune propriété</div>
                        </div>
                    <?php endif?>
                </div>
            </div>
            
        </div>
    <script defer>
        //Add comma separation to price
        var prices = document.querySelectorAll('.priceValue');
        prices.forEach(price =>{
            priceValue = price.textContent;
            var formatedNumber = priceValue.replace(/\B(?=(\d{3})+(?!\d))/g,'.');
            price.textContent = formatedNumber;
        }
        )
        //Add comma separation to price end
    </script>
</body>
</html>
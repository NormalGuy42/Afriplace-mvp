<?php
    session_start();
    if(!$_SESSION['adminLogged']) {
      header("location: index.php"); 
      die(); 
    }
?>
<header class="header_container">
        <nav>
            <div class="admin_logo_area">
                <a href="admin.php"><span><label class="logo">afriplace</label></span></a>
            </div>
            <svg class="burger" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="burger_svg" version="1.1" 
                width="400" height="400" viewBox="0, 0, 400,400">
                    <g id="svgg" class="burger">
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
                        fill="#040404" fill-rule="evenodd" class="burger">
                        </path>
                    </g>
                </svg>
        </nav>
</header>
    <section class="admin_section">
        <nav class="admin_nav">
            <ul>
                <li>
                    <a href="admin.php">
                        <!-- <img src="../assets/person_icon.svg"> -->
                        <img src="../assets/dashboard.svg" alt="" class="resize">
                        Acceuil
                    </a>
                </li>
                <li>
                    <a href="inbox.php">
                        <img src="../assets/message.svg" alt=""class="resize">
                        Messages
                    </a>
                </li>
                <!-- <li>
                    <a href="ad_manager.php">
                        <img src="../assets/ads.svg" alt="" class="resize">
                        Ads
                    </a>
                </li>  -->
                <li>
                    <a href="properties.php">
                        <img src="../assets/house_icon.svg">
                        Biens
                    </a>
                </li>
                <li>
                    <a href="users.php">
                        <img src="../assets/person_icon.svg">
                        Utilisateurs
                    </a>
                </li>
                <li>
                    <a href="../index.php" target="_blank">
                        <img src="../assets/web_icon.svg">
                        Site
                    </a>
                </li>
                <li>
                    <a href="settings.php">
                        <img src="../assets/gear.svg" alt="" class="resize">
                        Settings
                    </a>
                </li>
            </ul>
        </nav>
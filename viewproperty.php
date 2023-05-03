<?php
    include("config/connection.php");
    $propertyID = $_GET['id']; 
    $query = "SELECT * FROM properties WHERE id = $propertyID";
    $property = mysqli_fetch_assoc(mysqli_query($db,$query));

    //Get user info
    $userID = $property['userID'];
    $userQuery = "SELECT * FROM users WHERE id=$userID";
    $user = mysqli_fetch_assoc(mysqli_query($db,$userQuery));

    //Update views
    $numViews = $property['views'];
    $viewQuery = "UPDATE properties SET `views` = $numViews+1 WHERE `id`=$propertyID";
    mysqli_query($db,$viewQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propriété</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/viewproperty.css">
    <script src="scripts/script.js" defer></script>
</head>
<body>
   <!--Header end-->
   <?php include('templates/header.php')?>
    <!--Header start-->
    <section>
        <div class="property_container">
            <div class="exit_arrow">
            </div>
            <div class="img_containers" data-slide-container>
                <a href="fullscreen.php?id=<?php echo htmlspecialchars($propertyID)?>">
                    <ul data-slides>
                        <?php
                            $images = explode(',',$property['images']);
                            array_pop($images);
                            foreach($images as $img):
                        ?>
                            <li class="slide" <?php if($img == $images[0]) echo 'data-active'?>>
                                <img src="<?php echo htmlspecialchars($img)?>" alt="">
                            </li>
                        <?php endforeach?>
                    </ul>
                </a>
                <a href="fullscreen.html"class="more_photos">
                    <button><span id="current_img">1</span> sur <span id="total_img">30</span></button>
                </a>
                <button class="slide-btn prev" data-slide-btn="prev">
                    <svg viewBox="0 0 32 32" 
                        class="chevron left" 
                        aria-hidden="true" focusable="false" role="img"><title>Chevron Left</title>
                        <path stroke="none" d="M29.41 8.59a2 2 0 00-2.83 0L16 19.17 5.41 8.59a2 2 0 00-2.83 2.83l12 
                        12a2 2 0 002.82 0l12-12a2 2 0 00.01-2.83z"></path>
                    </svg>
                </button>
                <button class="slide-btn next" data-slide-btn="next">
                    <svg viewBox="0 0 32 32" 
                        class="chevron right" 
                        aria-hidden="true" focusable="false" role="img"><title>Chevron Right</title>
                        <path stroke="none" d="M29.41 8.59a2 2 0 00-2.83 0L16 19.17 5.41 8.59a2 2 0 00-2.83 2.83l12 
                        12a2 2 0 002.82 0l12-12a2 2 0 00.01-2.83z"></path>
                    </svg>
                </button>
            </div>  
            <div class="adress"><span><?php echo htmlspecialchars($property['quartier'])?></span></div>  
            <div class="property_info">
                <div class="column price">
                    <div class="column_row price"><span class="priceValue"><?php echo htmlspecialchars($property['price'])?></span> GNF</div>
                    <label class="price_label">Prix</label>
                </div>
                <?php if($property['type'] == "Maison" || $property['type'] == "Appart"):?>
                    <div class="column">
                        <div class="column_row"><span class="priceValue"><?php echo htmlspecialchars($property['bedNum'])?></span> </div>
                        <label>Lits</label>
                    </div>
                    <div class="column">
                        <div class="column_row"><?php echo htmlspecialchars($property['toiletteNum'])?></div>
                        <label>Toilettes</label>
                    </div>
                <?php endif?>
                <div class="column">
                    <div class="column_row"><?php echo htmlspecialchars($property['surface'])?>m<sup>2</sup></div>
                    <label>Surface</label>
                </div>
            </div>   
            <div class="property_details">
                <div class="details_box">
                    <div class="description">
                        <h3>Description</h3>
                        <div class="line"></div>
                        <p>
                            <?php echo htmlspecialchars($property['description'])?>
                        </p>
                    </div>
                    <div class="installation">
                        <h3>Installations</h3>
                        <div class="line"></div>
                        <ul class="installation_list"> 
                            <?php
                                $installations = explode(',',$property['quirks']);
                                array_pop($installations);
                                foreach($installations as $i):
                            ?>
                                <li><?php echo htmlspecialchars($i)?></li>
                            <?php endforeach?>
                        </ul>
                    </div>
                    <div class="contact_title">
                        <h3>Contact</h3>
                    </div>
                </div>
                <div class="contact_box">
                    <div class="contact_info">
                        <img src="assets/user-pfp.png">
                        <h3>
                            <?php
                               if(!empty($user['display_name'] && $user['display_name'] !== null)){
                                echo $user['display_name'];
                                }else{
                                    echo $user['nom'].' '.$user['prenom'];
                                } 
                            ?>
                        </h3>
                        <label>
                            <?php
                                if(!empty($user['display_name'] || $user['display_name'] != 'null')){
                                    echo 'Agence';
                                }else{
                                    echo 'Propiétaire';
                                    
                                }
                            ?>
                        </label>
                        <button class="contact_btn">Mettre en contact</button>
                        <div class="contact_form">
                            <form>
                                <select>
                                    <option>Je suis intéressé(e) par votre bien</option>
                                    <option>Je souhaite visiter ce bien</option>
                                    <option>Je veux me renseigner</option>
                                </select>
                                <input type="text" placeholder="Nom et Prénom">
                                <input type="email" placeholder="Email">
                                <input type="number" placeholder="Numéro de télephone">
                                <textarea cols="20" placeholder="Votre message"></textarea>
                                <button class="contact_form_btn">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile_contact_box">
                <div class="mobile_contact_info">
                    <div class="contact_id">
                        <label>
                            <?php
                                if(!empty($user['display_name'] && $user['display_name'] !== null)){
                                    echo $user['display_name'];
                                }else{
                                    echo $user['nom'].' '.$user['prenom'];
                                }
                            ?>
                        </label>
                        <p>
                            <?php
                                if(!empty($user['display_name'] || $user['display_name'] != 'null')){
                                    echo 'Agence';
                                }else{
                                    echo 'Propiétaire';
                                    
                                }
                            ?>
                        </p>
                    </div>
                    <button class="contact_btn">Mettre en contact</button>
                </div>
                <div class="contact_form">
                    <form>
                        <select>
                            <option>Je suis intéressé(e) par votre bien</option>
                            <option>Je souhaite visiter ce bien</option>
                            <option>Je veux me renseigner</option>
                        </select>
                        <input type="text" placeholder="Nom et Prénom">
                        <input type="email" placeholder="Email">
                        <input type="number" placeholder="Numéro de télephone">
                        <textarea cols="20" placeholder="Votre message"></textarea>
                        <button class="contact_form_btn">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Footer start-->
    <?php include('templates/footer.php')?>
    <!--Footer end-->
    <script defer>
        //View property start
        //Image slider code code
        const buttons = document.querySelectorAll("[data-slide-btn]");
        //Image counter handler
        const currentImg = document.querySelector('#current_img');
        const totalImg = document.querySelector('#total_img');
        const images = document.querySelector("[data-slides]");
        //Total amount of images
        totalImg.innerText = images.children.length;

        buttons.forEach(button =>{
        button.addEventListener("click",()=>{
            if(images.children.length >1){
                //Find which button was pressed and retrieve data from the slide container
                const offset = button.dataset.slideBtn === "next" ?1:-1
                const slides = button.closest("[data-slide-container]").querySelector("[data-slides]")
                const activeSlide = slides.querySelector("[data-active]")
                //Index
                let newIndex = [...slides.children].indexOf(activeSlide) + offset
                if(newIndex < 0) newIndex = slides.children.length -1
                if(newIndex >= slides.children.length) newIndex = 0
                //Make changes
                slides.children[newIndex].dataset.active = true
                currentImg.innerText = newIndex+1
                delete activeSlide.dataset.active
            }
        })
        })
        //Contact form 
        const activateForms = document.querySelectorAll('.contact_btn');
        const forms = document.querySelectorAll('.contact_form');
        activateForms.forEach(activateForm=>{
                activateForm.addEventListener('click',()=>{
                forms.forEach(form=>{
                    form.classList.toggle('show');
                })
                
            })
        })
        forms.forEach(form=>{
            document.addEventListener('click',(e)=>{
            if(!e.target.closest('.contact_btn') && form.classList.contains('show')){
                if(!e.target.closest('.contact_form')){
                    form.classList.remove('show');
                }
            }
        }
        )
        })
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
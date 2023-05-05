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

    //Message
    $headerLink = "viewproperty.php?id=$propertyID";
    $errors = ['objet'=>'','email'=>'','phone'=>'','name'=>'','message'=>''];
    $objet = $email = $phone = $name = $message = '';
    if(isset($_POST['submitMessage'])){
        //Check object
        if(empty($_POST['objet']) || $_POST['objet'] == "choice"){
            $errors['objet'] = 'Vous devez choisir la raison de votre demande';
        }else{
            $objet = $_POST['objet'];
        }
        //Check name
        if(empty($_POST['name'])){
            $errors['name'] = 'Entrez votre nom et votre prenom';
        }
        else{
            $name = $_POST['name'];
            if(!preg_match('/^[a-zA-Zéêèçîô\s]+$/',$name)){
                $errors['name'] ='Votre nom doit uniquement contenir des lettres';
            }
        }
        //Check email
        if(empty($_POST['email'])){
            $errors['email'] = 'Entrez votre email';
        }else{
            $email = $_POST['email'];
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Votre email doit être une adresse email valide';
            }
        }
        //Check telephone
        if(empty($_POST['phone'])){
            $errors['phone'] = 'Entrez votre numero de téléphone';
        }
        else{
            $phone = $_POST['phone'];
            if(!preg_match('/^\+?[1-9][0-9]{7,14}$/',$phone)){
                $errors['phone'] = 'Format du numero incorrect';
            }
        }
        //Check message
        if(empty($_POST['message'])){
            $errors['message'] = 'Entrez un message';
        }else{
            $message = $_POST['message'];
        }
        if(!array_filter($errors)){
            //objet
            if($objet== "interest"){
                $objet = "est intéressé par votre bien";
            }
            if($objet== "visit"){
                $objet = "souhaite visiter votre bien";
            }
            if($objet== "renseignement"){
                $objet = "souhaite se renseigner";
            }
            //Put in query
            $objet = mysqli_real_escape_string($db,$objet);
            $email = mysqli_real_escape_string($db,$_POST['email']);
            $name = mysqli_real_escape_string($db,$_POST['name']);
            $phone = mysqli_real_escape_string($db,$_POST['phone']);
            $message = mysqli_real_escape_string($db,$_POST['message']);
            $propertyName = mysqli_real_escape_string($db,$property['title']);
            $userID = mysqli_real_escape_string($db,$property['userID']);

            $sql = "INSERT INTO `messages`(`objet`, `email`, `name`, `phone`, `message`, `user_ID`, `property_name`) 
            VALUES ('$objet','$email','$name','$phone','$message','$userID','$propertyName')";
            if(mysqli_query($db,$sql)){
                $numMessages = $property['messages'];
                $messageQuery = "UPDATE properties SET `messages` = $numMessages+1 WHERE `id`=$propertyID";
                mysqli_query($db,$messageQuery);
                header('Location: '.$headerLink);
            }
        }
    }
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
                        <div class="contact_form <?php if(array_filter($errors)){echo 'show';}?>">
                            <form action="<?php echo htmlspecialchars($headerLink)?>" method="POST">
                                <select name="objet">
                                    <option value="choice">Choissisez une raison</option>
                                    <option value="interest"<?php if(isset($_POST['submit'])){if($_POST['objet']=="interest"){echo 'selected';}}?>>Je suis intéressé(e) par votre bien</option>
                                    <option value="visit" <?php if(isset($_POST['submit'])){if($_POST['objet']=="visit"){echo 'selected';}}?>>Je souhaite visiter ce bien</option>
                                    <option value="renseignement" <?php if(isset($_POST['submit'])){if($_POST['objet']=="renseignement"){echo 'selected';}}?>>Je veux me renseigner</option>
                                </select>
                                <div class="error"><?php echo $errors['objet']?></div>
                                <input type="text" placeholder="Nom et Prénom" name="name" value="<?php echo $name?>">
                                <div class="error"><?php echo $errors['name']?></div>
                                <input type="email" placeholder="Email" name="email" value="<?php echo $email?>">
                                <div class="error"><?php echo $errors['email']?></div>
                                <input type="number" placeholder="Numéro de télephone" name="phone" value="<?php echo $phone?>">
                                <div class="error"><?php echo $errors['phone']?></div>
                                <textarea cols="20" placeholder="Votre message" name="message"><?php echo $message?></textarea>
                                <div class="error"><?php echo $errors['message']?></div>
                                <button class="contact_form_btn" name="submitMessage">Envoyer</button>
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
                <div class="contact_form <?php if(array_filter($errors)){echo 'show';}?>">
                    <form action="<?php echo htmlspecialchars($headerLink)?>" method="POST">
                        <select name="objet">
                            <option value="choice">Choissisez une raison</option>
                            <option value="interest"<?php if(isset($_POST['submit'])){if($_POST['objet']=="interest"){echo 'selected';}}?>>Je suis intéressé(e) par votre bien</option>
                            <option value="visit" <?php if(isset($_POST['submit'])){if($_POST['objet']=="visit"){echo 'selected';}}?>>Je souhaite visiter ce bien</option>
                            <option value="renseignement" <?php if(isset($_POST['submit'])){if($_POST['objet']=="renseignement"){echo 'selected';}}?>>Je veux me renseigner</option>
                        </select>
                        <div class="error"><?php echo $errors['objet']?></div>
                        <input type="text" placeholder="Nom et Prénom" name="name" value="<?php echo $name?>">
                        <div class="error"><?php echo $errors['name']?></div>
                        <input type="email" placeholder="Email" name="email" value="<?php echo $email?>">
                        <div class="error"><?php echo $errors['email']?></div>
                        <input type="number" placeholder="Numéro de télephone" name="phone" value="<?php echo $phone?>">
                        <div class="error"><?php echo $errors['phone']?></div>
                        <textarea cols="20" placeholder="Votre message" name="message"><?php echo $message?></textarea>
                        <div class="error"><?php echo $errors['message']?></div>
                        <button class="contact_form_btn" name="submitMessage">Envoyer</button>
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
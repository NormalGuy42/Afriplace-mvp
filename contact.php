<?php 
    if(isset($_POST['submit'])){
        //Check first name
        if(empty($_POST['firstName'])){
            echo 'Enter firstName';
        }else{
            echo htmlspecialchars($_POST['firstName']);
        }
        //Check last name
        if(empty($_POST['lastName'])){}
        //Check email
        if(empty($_POST['email'])){}
        //Check telephone
        if(empty($_POST['phone'])){}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous contacter</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
    <script src="scripts/script.js" defer></script>
</head>
<body>
    <!--Header end-->
    <?php include('templates/header.php')?>
    <!--Header start-->
    
    <section class="contact_section">
        <div class="contact_img">
            <img src="./assets/darkoj.svg">
        </div>
        <form  class="contact_form" action="contact.php" method="POST">
            <div class="contact_row">
                <div class="text-center">
                    <h3>Envoyez nous un message</h3>
                </div>
                <label>Type de demande</label>
                <select class="login_field contact" name="object">
                    <option>Je veux lister ma propriété</option>
                    <option>Retirer ma propriété</option>
                    <option>Demande d'information générale</option>
                    <option>Suggestion pour le site</option>
                    <option>Plainte</option>
                    <option>Question</option>
                    <option>Autre</option>
                </select>
            </div>
            <div class="contact_group">
                <div class="contact_row">
                    <label>Nom</label>
                    <input class="login_field contact" type="text" maxlength="30" name="lastname">
                </div>
                <div class="contact_row">
                    <label>Prénom</label>
                    <input class="login_field contact" type="text" maxlength="30" name="firstName"> 
                </div>
            </div>
            <div class="contact_group">
                <div class="contact_row">
                    <label>Email</label>
                    <input class="login_field contact" type="email" maxlength="50" name="email">
                </div>          
                <div class="contact_row">
                    <label>Telephone</label>
                    <input class="login_field contact" type="tel" maxlength="50" name="phone">
                </div>
            </div>
            <div class="contact_row">
                <label>Votre message</label>
                <textarea class= "login_field textarea"name="" id="" cols="30" rows="10" maxlength="1000" name="message"></textarea>
            </div>
            <div class="contact_button">
                <button class="connexion contact" name="submit" value="submit">Envoyer</button>
            </div>
        </form>
    </section>
    <!--Footer start-->
    <?php include('templates/footer.php')?>
    <!--Footer end-->
</body>
</html>
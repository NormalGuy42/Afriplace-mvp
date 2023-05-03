<?php 
    include('config/connection.php');
    //Initialize variables
    $firstName = $lastName = $email = $phone = $message = $object = "";
    $errors = array('object'=>'','email'=>'','firstName'=>'','lastName'=>'','phone'=>'','message'=>'');
    
    if(isset($_POST['submit'])){
        //Check object
        if(empty($_POST['object']) || $_POST['object']=="choice"){
            $errors['object'] = 'Choissisez l\'objet de la demande';
        }else{
            $object = $_POST['object'];
        }
        //Check first name
        if(empty($_POST['firstName'])){
            $errors['firstName'] =  'Entrez votre prénom';
        }else{
            $firstName = $_POST['firstName'];
            if(!preg_match('/^[a-zA-Zéêèçîô\s]+$/',$firstName)){
                $errors['firstName'] = 'Votre prénom doit uniquement contenir des lettres';
            }
        }
        //Check last name
        if(empty($_POST['lastName'])){
            $errors['lastName'] = 'Entrez votre nom';
        }
        else{
            $lastName = $_POST['lastName'];
            if(!preg_match('/^[a-zA-Zéêèçîô\s]+$/',$lastName)){
                $errors['lastName'] ='Votre nom doit uniquement contenir des lettres';
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
        //If no errors
        if(!array_filter($errors)){
            $object = mysqli_real_escape_string($db,$_POST['object']);
            $name = mysqli_real_escape_string($db,$_POST['lastName']);
            $firstName = mysqli_real_escape_string($db,$_POST['firstName']);
            $email = mysqli_real_escape_string($db,$_POST['email']);
            $phone = mysqli_real_escape_string($db,$_POST['phone']);
            $message = mysqli_real_escape_string($db,$_POST['message']);

            $object = ucfirst($object);
            $query = "INSERT INTO admin_messages(object,last_name,first_name,email,phone,message) 
            VALUES('$object','$name','$firstName','$email','$phone','$message')";
            if(mysqli_query($db,$query)){
                header('Location: contact.php');
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
    <title>Nous contacter</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
    <script src="scripts/script.js" defer></script>
    <style>
        .FAQ h1{
            text-align: center;
            font-size: 28px;
            font-weight:bold;
        }   
        .error{
            color: red;
        }
        .FAQ .grid_container{
            display: grid;
            grid-template-columns: repeat(auto-fit,320px);
            justify-content: space-around;
            gap: 40px
        }
        .FAQ .container{
            cursor: pointer;
        }
        .FAQ .question{
            background-color: black;
            color: white;
            font-size: 18px;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .FAQ .question h3{
            overflow: hidden;
            max-width: 300px;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .FAQ .question svg{
            height: 20px;
            width: 22px;
            fill:gray;
        }
        .FAQ .answer{
            display: none;
        }
        .FAQ .answer[data-active="true"]{
            display: block !important;
        }
    </style>
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
                <select class="login_field contact" name="object" value="<?php echo htmlspecialchars($object)?>">
                    <option value="choice">Choissisez la raison de votre demande</option>
                    <option value="suggestion" <?php if($object =="suggestion"){echo 'selected';}?>>Suggestion pour le site</option>
                    <option value="plainte" <?php if($object =="plainte"){echo 'selected';}?>>Plainte</option>
                    <option value="question" <?php if($object =="question"){echo 'selected';}?>>Question</option>
                    <option value="other" <?php if($object =="other"){echo 'selected';}?>>Autre</option>
                </select>
                <div class="error"><?php echo $errors['object']?></div> 
            </div>
            <div class="contact_group">
                <div class="contact_row">
                    <label>Nom</label>
                    <input class="login_field contact" type="text" 
                    maxlength="30" name="lastName" value="<?php echo htmlspecialchars($lastName)?>" autocomplete="off">
                    <div class="error"><?php echo $errors['lastName']?></div>
                </div>
                <div class="contact_row">
                    <label>Prénom</label>
                    <input class="login_field contact" 
                    type="text" maxlength="30" name="firstName" value="<?php echo htmlspecialchars($firstName)?>" autocomplete="off">
                    <div class="error"><?php echo $errors['firstName']?></div> 
                </div>
            </div>
            <div class="contact_group">
                <div class="contact_row">
                    <label>Email</label>
                    <input class="login_field contact" 
                    type="email" maxlength="50" name="email" value="<?php echo htmlspecialchars($email)?>" autocomplete="off">
                    <div class="error"><?php echo $errors['email']?></div>
                </div>          
                <div class="contact_row">
                    <label>Telephone</label>
                    <input class="login_field contact" 
                    type="tel" maxlength="50" name="phone" value="<?php echo htmlspecialchars($phone)?>" autocomplete="off">
                    <div class="error"><?php echo $errors['phone']?></div>
                </div>
            </div>
            <div class="contact_row">
                <label>Votre message</label>
                <textarea class= "login_field textarea" name="message" id="" cols="30" rows="10" maxlength="1000" name="message"><?php echo htmlspecialchars($message)?></textarea>
                <div class="error"><?php echo $errors['message']?></div>
            </div>
            <div class="contact_button">
                <button class="connexion contact" name="submit" value="submit">Envoyer</button>
            </div>
        </form>
    </section>
    <!-- <section class="FAQ">
        <h1>FAQ</h1>
        <div class="grid_container">
            <div class="container">
                <div class="question">
                    <h3>Comment lister ma proprieté</h3>
                    <svg role="img" aria-label="" aria-hidden="true" class="svg" viewBox="0 0 30 28" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.961 18.183l7.056-7.147 1.893 1.868-8.951 9.068-8.927-9.069 1.896-1.866z">
                        </path>
                    </svg>
                </div>
                <div class="answer">
                    <h4>Pour faire cela</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim deleniti, natus maiores cumque officiis quo nostrum alias assumenda 
                    tenetur architecto optio? Saepe, assumenda ducimus! Omnis a corporis laudantium at quos?</p>
                </div>
            </div>
            <div class="container">
                <div class="question">
                    <h3>Comment lister ma proprieté</h3>
                    <svg role="img" aria-label="" aria-hidden="true" class="svg" viewBox="0 0 30 28" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.961 18.183l7.056-7.147 1.893 1.868-8.951 9.068-8.927-9.069 1.896-1.866z">
                        </path>
                    </svg>
                </div>
                <div class="answer">
                    <h4>Pour faire cela</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim deleniti, natus maiores cumque officiis quo nostrum alias assumenda 
                    tenetur architecto optio? Saepe, assumenda ducimus! Omnis a corporis laudantium at quos?</p>
                </div>
            </div>
            <div class="container">
                <div class="question">
                    <h3>Comment lister ma proprieté</h3>
                    <svg role="img" aria-label="" aria-hidden="true" class="svg" viewBox="0 0 30 28" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.961 18.183l7.056-7.147 1.893 1.868-8.951 9.068-8.927-9.069 1.896-1.866z">
                        </path>
                    </svg>
                </div>
                <div class="answer">
                    <h4>Pour faire cela</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim deleniti, natus maiores cumque officiis quo nostrum alias assumenda 
                    tenetur architecto optio? Saepe, assumenda ducimus! Omnis a corporis laudantium at quos?</p>
                </div>
            </div>
            
        </div>
    </section> -->

    <!--Footer start-->
    <?php include('templates/footer.php')?>
    <!--Footer end-->
    <script>
        var questions = document.querySelectorAll('.question');
        questions.forEach(question => {
            question.addEventListener('click',()=>{
                var answer = question.nextElementSibling;
                var activeAnswer = document.querySelectorAll('[data-active="true"]')
                if(!answer.dataset.active){
                    answer.dataset.active = true
                }else if(answer.dataset.active = true){
                    delete answer.dataset.active
                }
                try{
                    if(activeAnswer.length = 1){
                        delete activeAnswer[0].dataset.active;
                    }
                }catch(e){}
            })
        });
        //Close when click outside
        document.addEventListener('click',(e)=>{
            var activeAnswer = document.querySelector('[data-active="true"]')
            if(!e.target.closest('.question') && activeAnswer.dataset.active){
                delete activeAnswer.dataset.active
            }
        })
    </script>
</body>
</html>
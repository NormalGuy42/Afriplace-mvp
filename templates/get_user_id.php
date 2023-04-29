<?php
    include('../lib/user_authentication.php');
    try{
        session_start();
        if(is_user_logged_in() && isset($_SESSION['user_id'])){
            $_SESSION['isLogged'] = true;
            //Get user info if logged in
            $id = $_SESSION['user_id'];
            $sql = "SELECT * FROM users WHERE id ='$id'";
            $result = mysqli_query($db,$sql);
            $userData = mysqli_fetch_assoc($result);
        }else{
            header("location: login.php"); 
            die(); 
        }
       
    }catch(e){};
?>
<?php
    try{
        session_start();
        if(!$_SESSION['isLogged']) {
        header("location: login.php"); 
        die(); 
        }
        //Get user info if loggeg in
        $id = $_SESSION['id']['id'];
        $sql = "SELECT * FROM users WHERE id ='$id'";
        $result = mysqli_query($db,$sql);
        $userData = mysqli_fetch_assoc($result);
    }catch(e){};
?>
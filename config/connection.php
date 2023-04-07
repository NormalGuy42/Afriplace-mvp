<?php
    $servername = "localhost";
    $dbname = "afriplace";
    $username = "admin";
    $password = "200410";
    //Connect to database
    $db = mysqli_connect($servername,$username,$password,$dbname);
    //Check connection
    if(!$db){
        echo 'Connection error '.mysqli_connect_error();
    }
?>
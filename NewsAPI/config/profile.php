<?php

if(isset($_POST["update"])){

    $full_name = $_POST["full_name"];
    $username  = $_POST["username"];
    $email = $_POST["email"];
    $psw  = $_POST["password"];


    require_once 'connect.php';
    require_once 'functions.php';

    updateUser($conn, $full_name, $username, $email, $psw);
}
else{
    header("location: ../profile.php");
    exit();
}
    


<?php

if(isset($_POST["submit"])){

    $username = $_POST["Username"];
    $password_one  = $_POST["Password"];

    require_once 'connect.php';
    require_once 'functions.php';

    if(emptyLogin($username, $password_one) !== false){
        header("location: ../login_form.php?error=emptylogin");
        exit();
    }

    loginUser($conn, $username, $password_one);
}
else{
    header("location: ../login_form.php");
    exit();
}
    



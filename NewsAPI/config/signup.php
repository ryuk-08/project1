<?php 

if(isset($_POST["submit"])){

    $username = $_POST["username"];
    $fullName = $_POST["full_name"];
    $email = $_POST["email"];
    $password_one = $_POST["password"];
    $password_two = $_POST["password_confirmation"];

    require_once 'connect.php';
    require_once 'functions.php';

    if(emptySignup($username, $fullName, $email, $password_one, $password_two) !== false){
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../index.php?error=invalidemail");
        exit();
    }
    if(passwordMatch($password_one, $password_two) !== false){
        header("location: ../index.php?error=passwordsnotmatch");
        exit();
    }
    if(usernameExists($conn, $username, $email) !== false){
        header("location: ../index.php?error=usernametaken");
        exit();
    }

    createUser($conn, $username, $fullName, $email, $password_one);
}
    else{
        header("location: ../index.php");
        exit();
    }

<?php

function emptySignup($username, $fullName, $email, $password_one, $password_two){
    $result;
    if(empty($username) || empty($fullName) || empty($email) || empty($password_one) || empty($password_two)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;

}

function invalidEmail($email){
    $result;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function passwordMatch($password_one, $password_two){
    $result;

    if($password_one !== $password_two){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function usernameExists($conn, $username, $email){

    $sql = "SELECT * FROM users WHERE username = ?  OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $fullName, $email, $password_one){

    $sql = "INSERT INTO users(username, full_name, email, user_password) 
    VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password_one, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $username, $fullName, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();
}

function emptyLogin($username, $password_one) {
    $result;
    if(empty($username) || empty($password_one)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function loginUser($conn, $username, $password_one){
    $usernameExists = usernameExists($conn, $username, $username);

    if($usernameExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    $passhashed = $usernameExists["user_password"];
    $checkpassword = password_verify($password_one, $passhashed);

    if($checkpassword === false){
        header("location: ../login.php?error=wrongpass");
        exit();
    }
    else if($checkpassword === true){
        session_start();
        $_SESSION["userid"] = $usernameExists["userId"];
        $_SESSION["usernameid"] = $usernameExists["username"];
        $_SESSION["emailid"] = $usernameExists["email"];
        header("location: ../home.php");
        exit();

    }
}

function updateUser($conn, $full_name, $username, $email, $psw){
        session_start();
        $currentUser = $_SESSION["usernameid"] ;
        $sql = "UPDATE users SET full_name='$full_name', username='$username', 
        email='$email', user_password='$psw' WHERE username='$currentUser' ";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo"<script> alert('Profile updated successully');</script>";
        }else{
            echo"<script>alert('Profile cannot be updated');</script>";
            echo $conn->error;
        }
    }



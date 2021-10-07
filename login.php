<?php

if (isset($_POST['login-btn'])) {
    require 'databasehandler.php';

    $email = $_POST['Email'];
    $pass = $_POST['Password'];

    if (empty($email) || empty($pass)){
        header("Location: index.html?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE username=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: index.html?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $email, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($pass, $row['pass']);
                if ($pwdCheck == false) {
                    header("Location: index.html?error=wrongpassword");
                    exit(); 
                }
                else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userID'] = $row['UserID'];
                    $_SESSION['username'] = $row['username'];

                    header("Location: index.html?login=success");
                    exit(); 
                }
            }
            else {
                header("Location: index.html?error=nouser");
                exit(); 
            }
        }
    }
}
else {
    header("Location: index.html");
    exit();
}

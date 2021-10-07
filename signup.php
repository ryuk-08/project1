
   
<?php
if (isset($_POST['signup-submit'])) {
    
    require 'databasehandler.php';

    $username = $_POST['username']
    $fname =  $_POST['First-name'];
    $lname = $_POST['Last-name'];
    $email = $_POST['Email'];
    $pass = $_POST['Password']; 
    $passwordRepeat = $_POST['Confirm-password'];


    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: signup.html?error=emptyfields&First-name=".$fname."&Last-name=".$lname."&Email=".$email);
        exit();
    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $fname, $lname)) {
        header("Location: signup.html?error=invalid");
        exit();
    }

     else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: signup.html?error=invalidmail&First-name=".$fname."&Last-name=".$lname);
        exit();
     }

     else if (!preg_match("/^[a-zA-Z0-9]*$/", $fname, $lname)) {
        header("Location: signup.html?error=invalidname&Email=".$email);
        exit();
     } 

     else if ($password !== $passwordRepeat) {
        header("Location: signup.html?error=pwdcheck&First-name=".$fname."&Last-name=".$lname."&Email=".$email);
        exit();
     }

     else {
         $sql = "SELECT username FROM users WHERE username=?";
         $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: signup.html?error=sqlerror");
            exit();
         }

         else{
             mysqli_stmt_bind_param($stmt, "s", $username);
             mysqli_stmt_execute($stmt);
             mysqli_stmt_store_result($stmt);
             $resultCheck = mysqli_stmt_num_rows($stmt);
             if ($resultCheck > 0) {
                header("Location: signup.html?error=usertaken&Email=".$email);
                exit();
             }
             else{
                $sql = "INSERT INTO users (username, fname, lname, email, pass) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: signup.html?error=sqlerror");
                    exit();
                }
                 
                else{
                    $hashedpwd = password_hash($pass, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssss", $username, $fname, $lname, $email, $hashedpwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: signup.html?signup=success");
                    exit();
                }
             }
         }
     }
     mysqli_stmt_close($stmt);
     mysqli_close($conn);

} 
else {
    header("Location: signup.html");
    exit();
}

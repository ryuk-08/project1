<?php

if (isset($_POST["reset-request-submit"])) {
    
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "www.newsapp.net/create-new-password.php?selector=" . $selector . "&validator=" . 
    bin2hex($token);

    $expires = date("U") + 1800;

    require 'connect.php';

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM resetpasswords WHERE passEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $userEmail);
      mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO resetpasswords (passEmail, passSelector, passToken, passExpires) VALUES (?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
      $hashedToken = password_hash($token, PASSWORD_DEFAULT);  
      mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
      mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;
    
    $subject = 'Reset Password';

    $message = '<p>Hey! We received a password reset request. Please use the link below 
    to reset your password. If you did not make this request, you can ignore this email.</p>';
    $message .= '<p>Here is your password reset link: </br>';
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    $headers = "From: NewsApp <raqiea.johnson@rutgers.edu>\r\n";
    $headers .= "Reply-To: raqiea.johnson@rutgers.edu\r\n"; 
    $headers .= "Content-type: text/html\r\n"; 

    mail($to, $subject, $message, $headers);

    header("Location: ../reset-password.php?reset=success");

} else{
    header("Location: ../login.php");
}
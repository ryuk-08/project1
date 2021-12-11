<?php 
     session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
       <meta charset="UFT-8">
       <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
       <title>Index</title>
       <!-- Google Fonts-->
       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">    
       <link rel="stylesheet" href="css/style.css">     
    </head>
    <body>
    
       <nav>
          <div class="wrapper">
               <h1><a href="index.php">NewsApp</a></h1>
               <ul>
               <?php
                if(isset($_SESSION["usernameid"])){
                  echo "<li > <a href='profile.php'>Profile</a></li>";  
                  echo "<li > <a href='config/logout.php'>Log out</a></li>";
                }
                 else{
                  echo "<li><a href='login.php'>Log in</a></li>";
                 }
                ?>
                </ul>
          </div>
       </nav>

       <div class="container">
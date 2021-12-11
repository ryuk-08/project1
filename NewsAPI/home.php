<?php 
     session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
       <meta charset="UFT-8">
       <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
       <title>Home</title>
       <!-- Google Fonts-->
       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">    
       <link rel="stylesheet" href="css/style.css">     
    </head>
    <body>
    
       <nav>
          <div class="wrapper">
               <h1><a href="home.php">NewsApp</a></h1>
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
<style>
    body{
        background: #ffff;
    }
    .profile .content{
      font-size: 30px;
      color: #1e293e;
    }

    h2{
        float: right;
        margin-right: 5%;
        margin-top: 1%; 
    }
     
</style>

<body>
<section class="profile" >
    <div class="content">
    <?php
    if(isset($_SESSION["usernameid"])){     
        echo "<h2> Hi " . $_SESSION["usernameid"] . " ! </h2>";
    }
?>
    </div>
</section>

<form class="search">
    <label>Search</label>    
    <input type="text" id="input">
    <input type="submit" id="submit">
</form>

<div id="newsResults"></div>

<script src="jquery-3.3.1.min.js"></script>
<script src="newsapi.js"></script>

</body>
<?php include_once 'footer.php';  ?> 

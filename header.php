<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <title>News</title>         
    </head>
    <body>
 
 <!--    <nav>
        <div class="web-header">
                <h2>Logo</h2>
                <li class="sign-btn"><a href="login_form.php"> Sign in </a></li>
                <div class="search">
                <i class="bi bi-search"></i>      
                <label for="search"></label>
                <input type="search" id="search" name="searchBar" placeholder="type to search" >
                <button>search</button>   
            </div>
        </div> -->
 
        <nav>
             <ul>
                <li><a href = "#">Busines</a> </li>
                <li> <a href = "#">Entertainment</a> </li>
                <li> <a href = "#">General</a> </li>       
                <li>  <a href = "#">Health </a>  </li>      
                <li> <a href = "#">Science</a> </li>
                <li> <a href = "#">Sports </a> </li>       
                <li> <a href = "#">Technology </a></li>
        </ul>

          <a href="login_form.php" class="signin-btn"> Sign in </a> 
    </div>
    </nav>

            
                <?php
                if(isset($_SESSION["usernameid"])){
                    echo "<li> <a href='profile_page.php'> Profile page </a></li>";
                    echo "<li > <a href='config/logout.php'>Log out</a></li>";
                }
                else{
                    echo "<li> <a href='signup_form.php'> Sign up </a></li>";
                    echo "<li> <a href ='login_form.php'> Sign in </a></li>";
                }
                ?>
             </body>
            </html>

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
          <nav class = "menu">
             <ul>
                <li><a href = "#">Busines</a> </li>
                <li> <a href = "#">Entertainment</a> </li>
                <li> <a href = "#">General</a> </li>       
                <li>  <a href = "#">Health </a>  </li>      
                <li> <a href = "#">Science</a> </li>
                <li> <a href = "#">Sports </a> </li>       
                <li> <a href = "#">Technology </a></li>
        </ul>

<!-- <a href="login_form.php" class="signin-btn"> Sign in </a>  -->
          <form class="search">
                 <input type="text"  name="searchBar" placeholder="type to search" >
                <button>search</button>   
            </form>
    </div>
    </nav>

            <div class="header-login">
                <?php
                if(isset($_SESSION["usernameid"])){
                    echo '<form action="config/logout.php" class = "btn" method="post"><button
                    type= "submit" id="btn" name="log-btn">Log out</button></form>';
                }
                else{
                     echo '<form action="login_form.php" class="btn"><button
                     type= "submit" id="btn" name="sign-btn">Sign in</button></form>';
                 }
                ?>
                </div>

             </body>
            </html>

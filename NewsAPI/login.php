<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
       <meta charset="UFT-8">
       <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
       <title>Log in</title>
       <!-- Google Fonts-->
       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">          
       <link rel="stylesheet" href="css/style.css">  
       <style>
           .container{
               position: absolute;
               top: 60%;
               left: 50%;
               transform: translate(-50%, -50%);
            }

            a{
                color: #6665ee;
                text-decoration: none;
            }

            p{
                text-align: center;
            }

            p a{
                text-decoration: none;
            } 
       </style>   
    </head>
    <body>
    
       <nav>
          <div class="wrapper">
               <h1><a href="login.php">NewsApp</a></h1>
               <!--<ul>
                    <li><a href='login.php'>Log in</a></li>
                </ul> -->
          </div>
       </nav>

       <div class="container">
        <form action="config/login.php" method="POST">
        <h2> Log in </h2>

        <?php

if(isset($_GET["error"])){
    if($_GET["error"] == "emptylogin"){
        echo "<p style='color:red;'> Fill in all fields! </p>";
    }
    else if($_GET["error"] == "wronglogin"){
        echo "<p>Username or password is wrong </p>";
    }
    else if($_GET["error"] == "wrongpass"){
        echo "<p> Password is wrong </p>";
    }
  
} ?>
            <div class="inputbox">
                <label for="username"></label> 
                <input type="text" id="username" name="Username" placeholder="Username"> 
            </div>
            <div class="inputbox">
                <label for="password"></label>
                <input type="password" id="password" name="Password" placeholder="Password"> 
                <br><a href="requestReset.html">Forgot password?</a>
            </div>

            <br><button type="submit" class="login-btn" name="submit">Log in</button>
            
            <p>Don't have an account?<br><a href="index.php">Sign up</a></p>

        </form>       
       </div>
    </body>
 </html>

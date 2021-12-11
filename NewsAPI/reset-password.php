<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
       <meta charset="UFT-8">
       <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
       <title>Reset Password</title>
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

            h1{
                text-align: center;
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
        <form action="config/reset-request.php" method="POST">
        <h1> Reset Your Password </h1>
        <p>An e-mail will be sent to you with instructions on how to reset your password.</p>

        <input type="text" name="email" placeholder="Enter your e-mail address">
        <button type="submit" class="login-btn" name="reset-request-submit">Receive new password by e-mail</button>
        
        <?php
             if (isset($_GET["reset"])) {
                if ($_GET["reset"] == "success") {
                    echo '<p class="signupsuccess">Check your e-mail!</p>';
                }
             }
        ?>
        </form> 

       </div>
    </body>
 </html>

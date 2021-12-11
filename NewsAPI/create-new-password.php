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
        <section>
        <?php
           $selector = $_GET["selector"];
           $validator = $_GET["validator"];

           if (empty($selector) || empty($validator)) {
               echo "Could not validate your request!";
           } else{
               if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ) {
                    
                 ?>
                 
                <form action="config/reset-password.php" method="POST"> 
                    <input type="hidden" name="selector" value="<?php echo $selector?>">
                    <input type="hidden" name="validator" value="<?php echo $validator?>">
                    <input type="password" name="pwd" placeholder="Enter a new password">
                    <input type="password" name="pwd-repeat" placeholder="Confirm new password">
                    <button type="submit" class="login-btn" name="reset-password-submit">Reset</button>
               </form>

                 <?php
               }
           }
        ?>
        </section> 
       </div>
    </body>
 </html>

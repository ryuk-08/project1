<?php 
     session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
       <meta charset="UFT-8">
       <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
       <title>Log out</title>
       <!-- Google Fonts-->
       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">    
       <link rel="stylesheet" href="css/style.css">  
       <style>
    body{
        background: #ffff;
    }

    .sidebar{
        background-color: #1e293e;
        border-radius: 5px;
        color: white;
        height: 100%;
        width: 100%;
        padding: 10px 10px;
        top: -120px;
    }

    .sidebar a{
        margin-left: 10px;
        display: block;
        color: white;
        padding-bottom: 10px;
        font-size: 20px;
        text-decoration: none;
        text-align: center;
    }

    .card{
        position: relative;
        display:flex;
        flex-direction: column;
    }

    h1{
        text-align: center;
    }

    .main{
        margin-top: 90px;
    }
</style>        
    </head>
    <body>
    
       <nav>
          <div class="wrapper">
               <h1><a href="login.php">NewsApp</a></h1>
               <ul>
                  <li > <a href="login.php">Log in</a></li>  
                
                </ul>
          </div>
       </nav>
       <div class="container">

<div class="main">
    <div class="col-md-4 mt-1">
        <div class="card text-center sidebar">
            <div class="card-body">
                      <h1>You are Logged out !</h1>
                 </div>    
            </div>

        </div>

    </div> 
</div>

</body>




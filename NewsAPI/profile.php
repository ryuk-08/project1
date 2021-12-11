<?php 
     session_start();
     include 'config/connect.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
       <meta charset="UFT-8">
       <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
       <title>Profile</title>
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
        width: 50%;
        padding: 10px 10px;
        top: -40px;
        padding-bottom: 20px;
        left: 20%;
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

    .card-body{
        text-align: center;
    }

    p {
        text-align: center;
        font-size: 20px;
    }

    h3{
        padding-bottom: 50px;
    }

    .rounded-circle{
        width: 20%;
        border-radius: 70px;
    }

    a{
        color: red;
    }
            
    .main{
        margin-top: 70px;
    }        
</style>     
      
    </head>
    <body>
    
       <nav>
          <div class="wrapper">
               <h1><a href="home.php">NewsApp</a></h1>
               <ul>
               <?php
                if(isset($_SESSION["usernameid"])){
                  echo "<li > <a href='home.php'>Home</a></li>";  
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

<form action = "config/profile.php" method="POST">

<div class="main">
    <div class="col-md-4 mt-1">
        <div class="card text-center sidebar">
            <div class="card-body">
                 <h1>Profile</h1>
                 <img src="img.png" class="rounded-circle">
                 <div class="mt-3">

                 <?php  
        $currentUser = $_SESSION["usernameid"] ;
        $sql =  "SELECT * FROM users WHERE username ='$currentUser' " ;

        $gotResults = mysqli_query($conn, $sql);
        if($gotResults){
            if(mysqli_num_rows($gotResults)>0){
                while($row=mysqli_fetch_array($gotResults)){
?>

                    <div class="inputBox">
                        <input type="text" id="full_name" name="full_name" placeholder="Full name" 
                         value="<?php echo $row['full_name']; ?>">
                    </div>
                    <div class="inputBox">
                        <input type="text" id="username" name="username" placeholder="Username"
                        value="<?php echo $row['username']; ?>">
                    </div>
                    <div class="inputBox">
                        <input type="text" id="email" name="email" placeholder="Email"
                        value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="inputBox">
                        <input type="password" id="password" name="password" placeholder="Password"
                        value="<?php echo $row['user_password']; ?>">
                    </div>

                     <button type="submit"  name ="update">Update</button> 
                     <?php
                }
            }
        }
        ?>           
                 </div>    
            </div>

        </div>

    </div> 
    </form>
</div>

</body>








<?php include_once 'footer.php';  ?> 

<?php include_once 'header.php' ?>
 
<body>
    <div class="login">
        <h1> Log in </h1>

         <?php

if(isset($_GET["error"])){
    if($_GET["error"] == "emptyLogin"){
        echo "<p style='color:red;'> Fill in all fields! </p>";
    }
    else if($_GET["error"] == "wronglogin"){
        echo "<p>Username or password is wrong </p>";
    }
    else if($_GET["error"] == "wrongpass"){
        echo "<p> password is wrong </p>";
    }
  
} ?>
        <form action="config/login.php" method="POST">
            <div class="input-box">
                <label for="username"></label> 
                <input type="text" id="username" name="Username" placeholder="Username"> 
            </div>
            <div class="input-box">
                <label for="password"></label>
                <input type="password" id="password" name="Password" placeholder="Password"> 
            </div>
            <button type="submit" class="login-btn" name="submit">Log in</button>
            <br><a href="requestReset.html">Forgot your password?</a>
            <p>Don't have an account? <a href="signup_form.php">Sign up</a></p>

        </form>

       
    </div>
</body>
 
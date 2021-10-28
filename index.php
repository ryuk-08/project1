<?php include_once 'header.php' ?>
 
 <div >
     <?php
    if(isset($_SESSION["usernameid"])){     
        echo '<p class="login-status"> You are logged in! </p>';
    }
    else{
        echo '<p class="login-status"> You are logged out! </p>';
    }
?>
</div>

         

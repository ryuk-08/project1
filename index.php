<?php include_once 'header.php' ?>
 
 <div >
    <?php
    if(isset($_SESSION["usernameid"])){     
        echo "<p> Hello there " . $_SESSION["usernameid"] . "</p>";
    }
?>
</div>

         
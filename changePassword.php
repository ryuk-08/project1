<?php include_once 'header.php' ?>

<?php include 'config/connect.php';
 
    if(!isset($_GET["code"])){
        exit("Can't find code");
    }
    $code = $_GET["code"];

    $getEmailQuery = mysqli_query($conn, "SELECT email FROM resetPasswords WHERE code='$code'");
    if(mysqli_num_rows($getEmailQuery) == 0){
        exit("Can't find page");
    }
   if(isset($_POST["change"])){
        $pwd = $_POST["new_password"];
        $passhashed = md5($pwd);
        $row = mysqli_fetch_array($getEmailQuery);
        $email = $row["email"];

        $query = mysqli_query($conn, "UPDATE users SET user_password='$passhashed' WHERE email='$email' ");
        if($query){
            $query = mysqli_query($conn, "DELETE FROM resetPasswords WHERE code='$code'");
            exit("password updated");
        }
        else{
            exit("Something went wrong");
        }
    } 
    ?>
          <form class="container" method="POST">
                <h1> Password change </h1>
            <div class="inputbox">
                <label for="newpassword"></label>
                <input type="password" id="newpassword" name="new_password" placeholder="New Password">
             </div>
            <button type="submit" class="change-btn" name = "change">Change</button>
          </form>
 
 
<?php
 
$servername="localhost";
$db_username="root";
$password="";
$database_name="database1";

$conn =  mysqli_connect($servername,$db_username,$password,$database_name);

if(!$conn){
    die("connection failed: " .mysqli_connect_error());
}
 

/* if(isset($_POST['submit'])){

$username = $_POST['username'];
$fullName = $_POST['full_name'];
$email = $_POST['email'];
$password_one = $_POST['password'];
$password_two = $_POST['password_confirmation'];

$sql_query = "INSERT INTO signup_account(username, first_name, email, password_one,
     password_two)VALUES('$username', '$firstName', '$lastName', '$email', '$password_one', '$password_two')";

     if(mysqli_query($conn, $sql_query)){
             echo "registration succesfully..";
     }
     else{
         echo "Error: " . $sql . "" . mysqli_error($conn);
     }
     mysqli_close($conn);


}
?> */
<?php
 
$servername="localhost";
$db_username="root";
$password="Samsong2020#";
$database_name="database1";

$conn =  mysqli_connect($servername,$db_username,$password,$database_name);

if(!$conn){
    die("connection failed: " .mysqli_connect_error());
}
 
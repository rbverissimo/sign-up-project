<?php 

$HOSTNAME = "localhost";
$USERNAME  = "root";
$PASSWORD = "";
$DATABASE = "signupforms";

$conn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if(!$conn){
      die("Connection failed : " .mysqli_connect_error($conn));     
} 


?>
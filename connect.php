<?php 

$HOSTNAME = 'localhost';
$USERNAME  = 'root';
$PASSWORD = 'Jaqueline12@';
$DATABASE = 'signupforms';

$conn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if($conn) {
      echo "Connection succesful!"; 
} else {
      die(mysqli_error($conn));
}


?>
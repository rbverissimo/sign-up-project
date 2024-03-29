<?php 

$success = 0;
$user = 0;
$invalid = 0; 

if($_SERVER["REQUEST_METHOD"] == "POST") {
    include "connect.php";

   /*  $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "insert into `registration`(username,password) values('$username','$password')";
    $result=mysqli_query($conn,$sql);

    if($result){
      echo "Data inserted successfully";
    } else {
      die(mysqli_error($conn));
    } */

    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];  

      $sql = "select * from `registration` where username='$username'";
      $result=mysqli_query($conn,$sql);
      if($result){
            $num=mysqli_num_rows($result);
            if($num > 0){
                  // echo "User already on the database";
                  $user = 1; 
            }else {
                  if($password===$cpassword){
                  $sql = "insert into `registration`(username,password) values('$username','$password')";
                  $result=mysqli_query($conn,$sql); 

                  if($result){
                      //  echo "Signup Successfully";
                      $success = 1;
                      //when the user signs up successfully it redirecs to login
                      header('location:login.php');
                  } 
                } else $invalid = 1; 
            }
      }    

}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sign up</title>
  </head>
  <body>

  <?php 

    if($user) {
      // this is a bootstrap alert for the user already inserted into the database
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Sorry, </strong>the username you are trying to register already exists.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'; 
    }

  ?>

<?php

    if($user) {
      // this is a bootstrap alert for the user already inserted into the database
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Sorry, </strong>the password does not match.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'; 
    }

  ?>

  <?php 

    if($success) {
      // this is a bootstrap alert for success
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Hi, </strong> you are now signed up! 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'; 
    }

  ?>
      <h1 class="text-center">Sign up to our website</h1>
      <div class="container mt-5">
            <form action="sign.php" method="POST">
            <div class="form-group">
            <label for="exampleInputUsername1">Name</label>
                  <input type="text" class="form-control" placeholder="Enter your username" name="username">
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" placeholder="Enter your password" name="password">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" placeholder="Confirm password" name="cpassword">
            </div>

            <button type="submit" class="btn btn-primary w-100">Sign up</button>
</form>
      </div>
</body>
</html>
<?php 

$login = 0;
$invalid = 0;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    include "connect.php";

    $username = $_POST["username"];
    $password = $_POST["password"]; 

      $sql = "select * from `registration` where username='$username' and password='$password'";
      $result=mysqli_query($conn,$sql);
      if($result){
            $num=mysqli_num_rows($result);
            if($num > 0){
                  $login = 1;
            }else {
                  $invalid = 1;
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

    <title>Login</title>
  </head>
  <body>
  <?php 

    if($login) {
      // this is a bootstrap alert for success
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Hi, </strong> you are now logged in! 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'; 
    }

  ?>

      
  <?php if($invalid){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Sorry, </strong> invalid username or password.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
  ?>

      <h1 class="text-center">Login to our website</h1>
      <div class="container mt-5">
            <form action="login.php" method="POST">
            <div class="form-group">
            <label for="exampleInputUsername1">Name</label>
                  <input type="text" class="form-control" placeholder="Enter your username" name="username">
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" placeholder="Enter your password" name="password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Log in</button>
</form>
      </div>
</body>
</html>
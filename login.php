<?php 

$success = 0;
$user = 1;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    include "connect.php";

    $username = $_POST["username"];
    $password = $_POST["password"]; 

      $sql = "select * from `registration` where username='$username'";
      $result=mysqli_query($conn,$sql);
      if($result){
            $num=mysqli_num_rows($result);
            if($num > 0){
                  // echo "User already on the database";
                  $user = 1; 
            }else {
                  $sql = "insert into `registration`(username,password) values('$username','$password')";
                  $result=mysqli_query($conn,$sql); 

                  if($result){
                      //  echo "Signup Successfully";
                      $success = 1;
                  } else {
                        die(mysqli_error($conn));
                  }
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

      <h1 classe="text-center">Login to our website</h1>
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
            <button type="submit" class="btn btn-primary w-100">Submit</button>
</form>
      </div>
</body>
</html>
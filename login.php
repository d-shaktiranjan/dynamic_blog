<?php

$passnotmatch=false;

if ($_SERVER["REQUEST_METHOD"]=="POST"){
  include 'parts/_dbconnect.php';
  $mail=$_POST["mail"];
  $password=$_POST["pass"];

  $sql="SELECT * FROM `admins` WHERE mail='$mail'";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);

  if($num==1){
    while($row=mysqli_fetch_assoc($result)){
      if($password==$row['password']){
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['mail']=$mail;
        header("location: post.php");
      } else{
        $passnotmatch=true;
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Author's Page</title>
  </head>
  <body>
  <?php include('parts/_navbar.php')?>
  <div class="container my-3">
      <h2>Login to post</h2>
    <form action="login.php" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="pass" name="pass">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
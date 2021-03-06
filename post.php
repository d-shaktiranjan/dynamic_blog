<?php

session_start();
if(!$_SESSION['loggedin']){
    header("location: login.php");
}

$done=false;

if ($_SERVER["REQUEST_METHOD"]=="POST"){
  include 'parts/_dbconnect.php';
  $title=$_POST["title"];
  $content=$_POST["content"];

  $sql="INSERT INTO `blog` (`title`, `content`, `time`, `author`) 
  VALUES ('$title', '$content', current_timestamp(), 'Shakti')";
  $result=mysqli_query($conn,$sql);
  if($result){
    $done=true;
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

    <title>Authos's Page</title>
  </head>
  <body>
    <?php include('parts/_navbar.php');
    if($done){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Added!</strong> Your new blog added.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    ?>

    <div class="container my-3">
        <h2>Fill to post</h2>
        <hr>
        <form action="post.php" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Blog Content</label>
    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Post Now</button>
    </form>
    <div class="container my-4">
    <button type="button" class="btn btn-outline-danger"
     onclick="document.location='parts/_logout.php'">Logout</button>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
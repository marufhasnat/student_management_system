<?php 

require_once './connection.php';

session_start();

if(isset($_SESSION['user_login'])){
    header('location: index.php');
  }

if(isset($_POST['login'])){
  $username   = $_POST['username'];
  $password   = $_POST['password'];

  $username_check = mysqli_query($conn,"SELECT * FROM `users` WHERE `username` = '$username' ");

  if(mysqli_num_rows($username_check) > 0){

    $row = mysqli_fetch_assoc($username_check);

    if($row['password'] == md5($password)){
      
      if ($row['status'] == 'active') {

        $_SESSION['user_login'] = $username;
        header('location: index.php');
      }
      else{
        $status_inactive = "Your Status Inactive!";
      }
    }

    else{
      $password_wrong = "This password is wrong!";
    }
    
  }
  else{
    $username_not_found = "This username not found!";
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
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>

    <style>
      body{
        background: rgb(244, 244, 244);
      }
    </style>

    <title>Login</title>
  </head>
  <body>
    
    
    <div class="container animate__animated animate__slideInDown">
      <br><br>
      <h1 class="text-center">Student Management System</h1>
      <br><br>
      <h2 class="text-center">Admin Login Form</h2><br>
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7 col-xs-4">
          <!-- form -->
          <form action="" method="post">
            <div>
              <input type="text" placeholder="Enter Username" class="form-control" name="username" id="username" required value="<?php if(isset($username)){echo $username;}?>"><br>
            </div>
            <div>
              <input type="password" placeholder="Enter Password" class="form-control" name="password" id="password" required value="<?php if(isset($password)){echo $password;}?>"><br>
            </div>
            <div>
              <input class="btn btn-info" type="submit" value="Login" name="login">
              <a href="../index.php" class="btn btn-light float-right">Back</a>
            </div>
          </form>
          <br><br>
          <!-- form -->
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-sm-5">
          <?php if(isset($username_not_found)){
            echo '<div class="alert alert-danger">'.$username_not_found.'</div>';
          } ?>
          <?php if(isset($password_wrong)){
            echo '<div class="alert alert-danger">'.$password_wrong.'</div>';
          } ?>
          <?php if(isset($status_inactive)){
            echo '<div class="alert alert-danger">'.$status_inactive.'</div>';
          } ?>
        </div>
      </div>
    </div>



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
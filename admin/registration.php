<?php 

//include "connection.php";
require_once './connection.php';

session_start(); 

if(isset($_POST['registration'])){
  //To see the submit
  // echo '<pre>';
  // print_r($_POST);

  // print_r($_FILES);
  // echo '</pre>';

  $name       = $_POST['name'];
  $age        = $_POST['age'];
  $mobile     = $_POST['mobile'];
  $email      = $_POST['email'];
  $username   = $_POST['username'];
  $password   = $_POST['password'];
  $c_password = $_POST['c_password'];


  //To see photo name
  // $photo = $_FILES['photo']['name'];
  // echo $photo;

  //Io break explode function is used
  $photo = explode('.',$_FILES['photo']['name']); //To break the array first we need to know by whom we will break it like dot and last portion is string
  //print_r($photo); //To see the break
  $photo = end($photo); //To see last value from an array we used end
  //echo $photo; //To see the extension
  $photo_name = $username.'.'.$photo; //To make photoname as username
  //echo  $photo_name; //To see photoname as username

  $input_error = array();

  if(empty($name)){
      $input_error['name'] = "The Name field is required";
  }

  if(empty($age)){
      $input_error['age'] = "The Age field is required";
  }

  if(empty($mobile)){
      $input_error['mobile'] = "The Mobile Number field is required";
  }

  if(empty($email)){
      $input_error['email'] = "The Email field is required";
  }

  if(empty($username)){
      $input_error['username'] = "The Username field is required";
  }

  if(empty($password)){
      $input_error['password'] = "The Password field is required";
  }

  if(empty($c_password)){
      $input_error['c_password'] = "The Confirm Password field is required";
  }

  if(empty($photo)){
      $input_error['photo'] = "The Photo field is required";
  }

  //To see the required field
  // echo '<pre>';
  // print_r($input_error);
  // echo '</pre>';
  if(count($input_error) == 0){

       // $email_check = mysqli_query($conn,"SELECT * FROM users WHERE email = $email");
       // if(mysqli_num_rows($email_check) > 0){
         
       // } else{
       //   $email_error = "This Email Address Already Exits!";
       // }


    if(strlen($username) > 7){

    } 
    else{
      $username_l = "Username More Than 8 Characters";
    }

    if(strlen($password) > 7){

      if($password == $c_password){

        $password = md5($password);
        $insertSql = "INSERT INTO `users`(`name`, `age`, `mobile`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$age','$mobile','$email','$username','$password','$photo_name','inactive')";
        $result = $conn -> query($insertSql);
        if($result){
          $_SESSION['data_insert_success'] = "Data Insert Success!";
          $success = 'Data Insert Success!';
          move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
          header('location: registration.php');
        }
        else{
          $_SESSION['data_insert_error'] = "Data Insert Error!";
          $error = 'Data Insert Error!';
        }

      }

      else{
        $password_not_match = "Wrong Confirm Password!";
      }

    }

    else{
      $password_l = "Password More Than 8 Characters";
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
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../style.css">

    <style>
      body{
        background: rgb(244, 244, 244);
      }
    </style>

    <title>Registration Form</title>
  </head>
  <body>
    
    
    <div class="container">
      <br><br>
      <h1 class="animate__animated animate__fadeIn">User Registration Form</h1>

      <?php if(isset($_SESSION['data_insert_success'])){
        echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>'; } unset($_SESSION['data_insert_success']) ?> 

      <?php if(isset($_SESSION['data_insert_error'])){
        echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';
      } unset($_SESSION['data_insert_error']) ?>


      <?php if(isset($success)){echo '<p class="alert alert-success col-sm-6">'.$success.'</p>';} ?>
      <?php if(isset($error)){echo '<p class="alert alert-danger col-sm-6">'.$error.'</p>';} ?>
      
      <hr />
      <br>
      <div class="row animate__animated animate__bounceInLeft">
        <div class="col-md-12">
          <!-- form -->
          <form action="" method="post" enctype="multipart/form-data" class="col-form-legend">
            <div class="form-group row">
              <label for="name" class="form-control-label col-sm-1 mt-2">Name</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="<?php if(isset($name)){echo $name;}?>">
              </div>
              <label class="error" style="margin-top: 6px;">
                <?php if(isset($input_error['name'])){
                      echo $input_error['name'];
                } ?>
              </label>
            </div>

            <div class="form-group row">
              <label for="age" class="form-control-label col-sm-1 mt-2">Age</label>
              <div class="col-sm-4">
                <input type="number" class="form-control" id="age" name="age" placeholder="Enter Your Age" value="<?php if(isset($age)){echo $age;}?>">
              </div>
              <label class="error" style="margin-top: 6px;">
                <?php if(isset($input_error['age'])){
                      echo $input_error['age'];
                } ?>
              </label>
            </div>

            <div class="form-group row">
              <label for="mobile" class="form-control-label col-sm-1 mt-2">Mobile</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Your Mobile Number" pattern="[0-9]{11}"
                value="<?php if(isset($mobile)){echo $mobile;}?>">
              </div>
              <label class="error" style="margin-top: 6px;">
                <?php if(isset($input_error['mobile'])){
                      echo $input_error['mobile'];
                } ?>
              </label>
            </div>

            <div class="form-group row">
              <label for="email" class="form-control-label col-sm-1 mt-2">Email</label>
              <div class="col-sm-4">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" 
                value="<?php if(isset($email)){echo $email;}?>">
              </div>
              <label class="error" style="margin-top: 6px;">
                <?php if(isset($input_error['email'])){
                      echo $input_error['email'];
                } ?>
              </label>
              
            </div>

            <div class="form-group row">
              <label for="username" class="form-control-label col-sm-1 mt-2">Username</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Your Username" 
                value="<?php if(isset($username)){echo $username;}?>">
              </div>
              <label class="error" style="margin-top: 6px;">
                <?php if(isset($input_error['username'])){
                      echo $input_error['username'];
                } ?>
              </label>
              <label class="error" style="margin-top: 6px;">
                <?php if(isset($username_l)){
                      echo $username_l;
                } ?>
              </label>
            </div>

            <div class="form-group row">
              <label for="password" class="form-control-label col-sm-1 mt-2">Password</label>
              <div class="col-sm-4">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" value="<?php if(isset($password)){echo $password;}?>">
              </div>
              <label class="error" style="margin-top: 6px;">
                <?php if(isset($input_error['password'])){
                      echo $input_error['password'];
                } ?>
              </label>
              <label class="error" style="margin-top: 6px;">
                <?php if(isset($password_l)){
                      echo $password_l;
                } ?>
              </label>
            </div>

            <div class="form-group row">
              <label for="c_password" class="form-control-label col-sm-1 mt-2">Confirm
              Password</label>
              <div class="col-sm-4">
                <input type="password" class="form-control" id="c_password" name="c_password" placeholder="Confirm Your Password" 
                value="<?php if(isset($c_password)){echo $c_password;}?>">
              </div>
              <label class="error" style="margin-top: 6px;">
                <?php if(isset($input_error['c_password'])){
                      echo $input_error['c_password'];
                } ?>
              </label>
              <label class="error" style="margin-top: 6px;">
                <?php if(isset($password_not_match)){
                      echo $password_not_match;
                } ?>
              </label>
            </div>

            <div class="form-group row">
              <label for="photo" class="form-control-label col-sm-1 mt-2">Photo</label>
              <div class="col-sm-4">
                <input id="photo" name="photo" type="file"
                  value="<?php if(isset($photo)){echo $c_photo;}?>">
              </div>
              <label class="error" style="margin-top: 2px;">
                <?php if(isset($input_error['photo'])){
                      echo $input_error['photo'];
                } ?>
              </label>
            </div>

            <div class="col-sm-4 offset-sm-1">
              <input class="btn btn-danger" type="submit" value="Registration" name="registration" style="margin-left: -15px;">
            </div>
            <br><br>

            <p>If you have an account? then please <a href="login.php" target="blank">Login</a></p>
            <br>
            
            
          </form>
          <!-- form -->
        </div>
      </div>
      <hr />
      <footer>
        <p>Copyright &copy; 2019 - <?php echo date('Y') ?> All Rights Reserved</p>
        <br><br>
      </footer>
    </div>


    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


  </body>
</html>
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

    <title>Student Management System</title>
  </head>
  <body>


    <div class="container">
      <br>
      <a href="admin/login.php" target="blank" class="btn btn-primary float-right 
      animate__animated animate__slideInRight">Login Admin</a>
      <br><br><br>
      <h2 class="text-center animate__animated animate__slideInLeft">Welcome To Student Management System</h2>
      <br><br>


      <div class="row justify-content-center animate__animated animate__shakeX">
        <div class="col-lg-6 col-md-8 col-xs-5">
          <!-- form -->
          <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <table class="table table-bordered">
              <tr>
                <td colspan="3" class="text-center"><label><b>Student Information</b></label></td>
              </tr>
              <tr>
                <td><label for="name"><b>Enter Name</b></label></td>
                <td><input class="form-control" type="text" placeholder="Enter Name" id="name" name="name" required></td>
              </tr>
              <tr>
                <td><label for="choose"><b>Choose Semester</b></label></td>
                <td>
                  <select class="form-control" name="choose" id="choose">
                    <option value="0" selected>Select</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                    <option value="6th">6th</option>
                    <option value="7th">7th</option>
                    <option value="8th">8th</option>
                    <option value="9th">9th</option>
                    <option value="10th">10th</option>
                    <option value="11th">11th</option>
                    <option value="12th">12th</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td><label for="roll"><b>Choose ID</b></label></td>
                <td><input class="form-control" type="text" pattern="[0-9]{8}" placeholder="Enter ID" id="roll" name="roll" required></td>
              </tr>
              <tr>
                <td colspan="2" class="text-center"><input class="btn btn-dark" type="submit" value="Show Info" name="show_info"></td>
              </tr>
            </table>
          </form>
          <!-- form -->
        </div>
      </div><br><br>
  

    <?php 

      require_once 'admin/connection.php';

      if(isset($_POST['show_info'])){

        $choose_name = $_POST['name'];
        $choose = $_POST['choose'];
        $roll = $_POST['roll'];

        $result = mysqli_query($conn,"SELECT * FROM students_info WHERE name = '$choose_name' and class = '$choose' and roll = '$roll' ");

        if(mysqli_num_rows($result) == 1){
          
          $row = mysqli_fetch_assoc($result);

        ?>


        <div class="row justify-content-center animate__animated animate__slideInUp">
          <div class="col-sm-8">
            <table class="table table-bordered mb-5">
              <tr>
                <td rowspan="7">
                  <div class="image text-center mt-5">
                    <img src="admin/student_images/<?= $row['photo'] ?>" class="img-thumbnail img-fluid" style="width: 200px;" alt="image">
                  </div>
                </td>
                <td>Name</td>
                <td><?= ucwords($row['name']) ?></td>
              </tr>
              <tr>
                <td>ID</td>
                <td><?= $row['roll'] ?></td>
              </tr>
              <tr>
                <td>Semester</td>
                <td><?= $row['class'] ?></td>
              </tr>
              <tr>
                <td>Age</td>
                <td><?= $row['age'] ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><?= $row['email'] ?></td>
              </tr>
              <tr>
                <td>City</td>
                <td><?= ucwords($row['city']) ?></td>
              </tr>
              <tr>
                <td>Contact</td>
                <td><?= $row['contact'] ?></td>
              </tr>
            </table>
          </div>
        </div>


        <?php }
        
        else{

       ?>


       <script>
         alert('Data Not Found');
       </script>
    
    <?php

            }

    } 

  ?>
    

    </div>
    
    

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
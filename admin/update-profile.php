<h1 class="text-primary"><i class="fas fa-pen-square"></i> Update Profile <small style="color: #000";>My Profile</small></h1>

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">
			<a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt" style="margin-top: 6px;
			letter-spacing: 5px;"></i> Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">
			<a href="index.php?page=user-profile"><i class="fas fa-user" style="margin-top: 6px;
			letter-spacing: 5px;"></i> My Profile</a></li>
			<li class="breadcrumb-item active" aria-current="page">
			<i class="fas fa-pen-square" style="margin-top: 5px;
			letter-spacing: 5px;"></i> Update Profile</li>
		</ol>
	</nav>



<?php 


$update_id = base64_decode($_GET['id']);

$db_data = mysqli_query($conn,"SELECT * FROM users WHERE id = $update_id");

$db_row = mysqli_fetch_assoc($db_data);


if(isset($_POST['update-profile'])){

		$name = $_POST['name'];
		$age = $_POST['age'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];


		$updateSql = "UPDATE users SET name = '$name', age = '$age', mobile = '$mobile', email = '$email' WHERE id = $update_id";

		
			
        $result = $conn -> query($updateSql);

        if($result){

        	$success = 'Data Insert Success!';
    
        }
        else{
        	$error = 'Data Insert Error!';
        	//die($conn -> error);
        }

	}


?>



 <div class="row">
 	<?php if(isset($success)){echo '<p class="alert alert-success col-sm-6">'.$success.'</p>';} ?>
 	<?php if(isset($error)){echo '<p class="alert alert-danger col-sm-6">'.$error.'</p>';} ?>
 </div>



<div class="row">
	<div class="col-sm-6">
		<!-- form -->
		<form action="" method="post" enctype="multipart/form-data">
			
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" placeholder="Enter Name" name="name" id="name" required value="<?= $db_row['name'];?>">
			</div>
			
			<div class="form-group">
				<label for="age">Age</label>
				<input type="text" class="form-control" placeholder="Enter Age" name="age" id="age" required value="<?= $db_row['age'];?>">
			</div>

			<div class="form-group">
				<label for="mobile">Mobile</label>
				<input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobile" id="mobile" pattern="01[3|5|6|7|8|9][0-9]{8}" required
				value="<?= $db_row['mobile'];?>">
			</div>
			
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" required value="<?= $db_row['email'];?>">
			</div><br>

			
			<div class="form-group">
				<input type="submit" value="Update Profile" name="update-profile" class="btn btn-primary float-right mb-5">
			</div>
			

		</form>
		<!-- form -->
	</div>
</div>
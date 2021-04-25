<h1 class="text-primary"><i class="fas fa-user"></i> User Profile <small style="color: #000";>My Profile</small></h1>

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">
			<a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt" style="margin-top: 5px;
			letter-spacing: 5px;"></i> Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">
			<i class="fas fa-user" style="margin-top: 4px;
			letter-spacing: 5px;"></i> Profile</li>
		</ol>
	</nav>


<?php 

$session_user = $_SESSION['user_login'];

$user_data = mysqli_query($conn,"SELECT * FROM users WHERE username = '$session_user' ");
$user_row = mysqli_fetch_assoc($user_data);
//print_r($user_row);

 ?>



<div class="row">
	<div class="col-sm-6">
		<table class="table table-bordered">
			<tr>
				<td>User ID</td>
				<td><?= $user_row['id'];?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><?= ucwords($user_row['name']);?></td>
			</tr>
			<tr>
				<td>Age</td>
				<td><?= $user_row['age'];?></td>
			</tr>
			<tr>
				<td>Mobile</td>
				<td><?= $user_row['mobile'];?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?= $user_row['email'];?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><?= $user_row['username'];?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><?= ucwords($user_row['status']);?></td>
			</tr>
			<tr>
				<td>Sign-Up Date</td>
				<td><?= $user_row['date_time'];?></td>
			</tr>
		</table>
		<a href="index.php?page=update-profile&id=<?php echo base64_encode($user_row['id']);?>" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i> Edit Profile</a>
	</div>
	<div class="col-sm-6">
		<a href="#">
			<img class="img-thumbnail img-fluid" src="images/<?= $user_row['photo'];?>" alt="iamge" style="width: 300px;">
		</a><br><br>

		<?php 

		if(isset($_POST['upload'])){
			$photo = explode('.',$_FILES['photo']['name']);
  			$photo = end($photo); 
  			$photo_name = $session_user.'.'.$photo;

  			$upload_image = mysqli_query($conn,"UPDATE users SET photo = '$photo_name' WHERE username = '$session_user' "); 
  			if($upload_image){
  				move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
  			}
		}

		 ?>

		<form action="" method="post" enctype="multipart/form-data">
			<label for="photo">Profile Picture</label><br>
			<input type="file" name="photo" id="photo" required><br><br>
			<input type="submit" name="upload" value="Upload" class="btn btn-sm btn-info">
		</form>
	</div>
</div>

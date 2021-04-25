

<h1 class="text-primary"><i class="fas fa-pen-square"></i> Update Student <small style="color: #000";>Update Student</small></h1>

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">
			<a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt" style="margin-top: 6px;
			letter-spacing: 5px;"></i> Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">
			<a href="index.php?page=all-students"><i class="fas fa-users" style="margin-top: 6px;
			letter-spacing: 5px;"></i> All Students</a></li>
			<li class="breadcrumb-item active" aria-current="page">
			<i class="fas fa-pen-square" style="margin-top: 5px;
			letter-spacing: 5px;"></i> Update Student</li>
		</ol>
	</nav>


<?php 

$update_id = base64_decode($_GET['id']);

$db_data = mysqli_query($conn,"SELECT * FROM students_info WHERE id = $update_id");

$db_row = mysqli_fetch_assoc($db_data);


if(isset($_POST['update-student'])){

		$name = $_POST['name'];
		$roll = $_POST['roll'];
		$age = $_POST['age'];
		$email = $_POST['email'];
		$city = $_POST['city'];
		$contact = $_POST['contact'];
		$class = $_POST['class'];

		// $picture = explode('.',$_FILES['picture']['name']);
		// $picture_ex = end($picture);
		// $picture_name = $roll.'.'.$picture_ex;
		//echo $picture_name;


		$updateSql = "UPDATE students_info SET name = '$name', roll = '$roll', age = '$age', email = '$email', city = '$city', contact = '$contact', class = '$class' 
			 WHERE id = $update_id";

		
			
        $result = $conn -> query($updateSql);

        if($result){

        	$success = 'Data Insert Success!';
       
        	header('location: index.php?page=all-students');
        }
        else{
        	//$error = 'Data Insert Error!';
        	die($conn -> error);
        }

	}


 ?>


<div class="row">
	<div class="col-sm-6">
		<!-- form -->
		<form action="" method="post" enctype="multipart/form-data">
			
			<div class="form-group">
				<label for="name">Student Name</label>
				<input type="text" class="form-control" placeholder="Enter Student Name" name="name" id="name" required value="<?= $db_row['name'];?>">
			</div>

			<div class="form-group">
				<label for="roll">Student ID</label>
				<input type="text" class="form-control" placeholder="Enter Student ID" name="roll" id="roll" pattern="[0-9]{8}" required 
				value="<?= $db_row['roll'];?>"> 
			</div>
			
			<div class="form-group">
				<label for="age">Student Age</label>
				<input type="text" class="form-control" placeholder="Enter Student Age" name="age" id="age" required value="<?= $db_row['age'];?>">
			</div>
			
			<div class="form-group">
				<label for="email">Student Email</label>
				<input type="email" class="form-control" placeholder="Enter Student Email" name="email" id="email" required value="<?= $db_row['email'];?>">
			</div>
			
			<div class="form-group">
				<label for="city">City</label>
				<input type="text" class="form-control" placeholder="Enter City Name" name="city" id="city" required value="<?= $db_row['city'];?>">
			</div>
			
			<div class="form-group">
				<label for="contact">Contact</label>
				<input type="text" class="form-control" placeholder="Enter Contact Number" name="contact" id="contact" pattern="01[3|5|6|7|8|9][0-9]{8}" required
				 value="<?= $db_row['contact'];?>">
			</div>
			
			<div class="form-group">
				<label for="class">Semester</label>
				<select name="class" id="class" class="form-control" required>
					<option value="">Select</option>
					<option <?php echo $db_row['class']=='1st' ? 'selected':'';?> value="1st">1st</option>
					<option <?php echo $db_row['class']=='2nd' ? 'selected':'';?> value="2nd">2nd</option>
					<option <?php echo $db_row['class']=='3rd' ? 'selected':'';?> value="3rd">3rd</option>
					<option <?php echo $db_row['class']=='4th' ? 'selected':'';?> value="4th">4th</option>
					<option <?php echo $db_row['class']=='5th' ? 'selected':'';?> value="5th">5th</option>
					<option <?php echo $db_row['class']=='6th' ? 'selected':'';?> value="6th">6th</option>
                    <option <?php echo $db_row['class']=='7th' ? 'selected':'';?> value="7th">7th</option>
                    <option <?php echo $db_row['class']=='8th' ? 'selected':'';?> value="8th">8th</option>
                    <option <?php echo $db_row['class']=='9th' ? 'selected':'';?> value="9th">9th</option>
                    <option <?php echo $db_row['class']=='10th' ? 'selected':'';?> value="10th">10th</option>
                    <option <?php echo $db_row['class']=='11th' ? 'selected':'';?> value="11th">11th</option>
                    <option <?php echo $db_row['class']=='12th' ? 'selected':'';?> value="12th">12th</option>
				</select><br>
			</div>
			

			<div class="form-group">
				<input type="submit" value="Update Student" name="update-student" class="btn btn-primary float-right mb-5">
			</div>
			

		</form>
		<!-- form -->
	</div>
</div>

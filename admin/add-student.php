

<h1 class="text-primary"><i class="fas fa-user-plus"></i> Add Student <small style="color: #000";>Add New Student</small></h1>

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">
			<a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt" style="margin-top: 6px;
			letter-spacing: 5px;"></i> Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">
			<i class="fas fa-user-plus" style="margin-top: 5px;
			letter-spacing: 5px;"></i> Add Student</li>
		</ol>
	</nav>



<?php 

	if(isset($_POST['add-student'])){

		$name = $_POST['name'];
		$roll = $_POST['roll'];
		$age = $_POST['age'];
		$email = $_POST['email'];
		$city = $_POST['city'];
		$contact = $_POST['contact'];
		$class = $_POST['class'];

		$picture = explode('.',$_FILES['picture']['name']);
		$picture_ex = end($picture);
		$picture_name = $roll.'.'.$picture_ex;
		//echo $picture_name;


		$insertSql = "INSERT INTO `students_info`(`name`, `roll`, `age`, `email`, `city`, `contact`, `class`, `photo`) VALUES('$name','$roll','$age','$email','$city','$contact','$class','$picture_name')";
        $result = $conn -> query($insertSql);

        if($result){

        	$success = 'Data Insert Success!';
        	move_uploaded_file($_FILES['picture']['tmp_name'],'student_images/'.$picture_name);
        }
        else{
        	//$error = 'Data Insert Error!';
        	die($conn -> error);
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
				<label for="name">Student Name</label>
				<input type="text" class="form-control" placeholder="Enter Student Name" name="name" id="name" required>
			</div>

			<div class="form-group">
				<label for="roll">Student ID</label>
				<input type="text" class="form-control" placeholder="Enter Student ID" name="roll" id="roll" pattern="[0-9]{8}" required> 
			</div>
			
			<div class="form-group">
				<label for="age">Student Age</label>
				<input type="text" class="form-control" placeholder="Enter Student Age" name="age" id="age" required>
			</div>
			
			<div class="form-group">
				<label for="email">Student Email</label>
				<input type="email" class="form-control" placeholder="Enter Student Email" name="email" id="email" required>
			</div>
			
			<div class="form-group">
				<label for="city">City</label>
				<input type="text" class="form-control" placeholder="Enter City Name" name="city" id="city" required>
			</div>
			
			<div class="form-group">
				<label for="contact">Contact</label>
				<input type="text" class="form-control" placeholder="Enter Contact Number" name="contact" id="contact" pattern="01[3|5|6|7|8|9][0-9]{8}" required>
			</div>
			
			<div class="form-group">
				<label for="class">Semester</label>
				<select name="class" id="class" class="form-control" required>
					<option value="" selected>Select</option>
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
				</select><br>
			</div>
			
			<div class="form-group">
				<label for="picture">Picture</label>
				<input style="padding: 5px;" type="file" class="form-control" name="picture" id="picture" required>
			</div>

			<div class="form-group">
				<input type="submit" value="Add Student" name="add-student" class="btn btn-primary float-right mb-5">
			</div>
			

		</form>
		<!-- form -->
	</div>
</div>
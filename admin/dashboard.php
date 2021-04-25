<h1 class="text-primary"><i class="fas fa-tachometer-alt"></i> Dashboard <small style="color: #000";>Statistics Overview</small></h1>

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">
			<i class="fas fa-tachometer-alt" style="margin-top: 5px;
			letter-spacing: 5px;"></i> Dashboard</li>
		</ol>
	</nav>
	


<?php 

//For Counting Students
$count_student = mysqli_query($conn,"SELECT * FROM students_info");

$total_student = mysqli_num_rows($count_student);


//For Counting Users
$count_user = mysqli_query($conn,"SELECT * FROM users");

$total_user = mysqli_num_rows($count_user);

//echo $total_student ;

 ?>


	
	<div class="row">
		<!-- single item -->
		<div class="col-sm-4">
			<div class="card">
				<div class="card-header text-white bg-primary">
					<div class="row">
						<div class="col-sm-3">
							<i class="fas fa-users fa-5x"></i>
						</div>
						<div class="col-sm-9">
							<div class="float-right" 		
							style="font-size: 40px;"><?= $total_student; ?></div>
							<div class="clearfix"></div>
							<div class="float-right">All Students</div>
						</div>
					</div>
				</div>
				<a href="index.php?page=all-students">
					<div class="card-footer">
						<span class="float-left">All Students</span>
						<span class="float-right"><i class="far fa-arrow-alt-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<!-- single item -->
		<!-- single item -->
		<div class="col-sm-4">
			<div class="card">
				<div class="card-header text-white bg-primary">
					<div class="row">
						<div class="col-sm-3">
							<i class="fas fa-users fa-5x"></i>
						</div>
						<div class="col-sm-9">
							<div class="float-right" 		
							style="font-size: 40px;"><?= $total_user; ?></div>
							<div class="clearfix"></div>
							<div class="float-right">All Users</div>
						</div>
					</div>
				</div>
				<a href="index.php?page=all-users">
					<div class="card-footer">
						<span class="float-left">All Users</span>
						<span class="float-right"><i class="far fa-arrow-alt-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<!-- single item -->


	</div>
	<br>
	<hr/>
	<h3>New Students</h3>

	<!-- Table Start -->
	<div class="table-responsive mt-5 mb-5">
		<table id="data" class="table table-hover table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Roll</th>
					<th>Age</th>
					<th>Email</th>
					<th>City</th>
					<th>Contact</th>
					<th>Photo</th>
				</tr>
			</thead>
			<tbody>
				
				<?php 

					$selectSql = "SELECT * FROM students_info";
					$result_show = $conn -> query($selectSql);

					if($result_show -> num_rows > 0){  

					while($result_student = $result_show -> fetch_assoc()){ ?>

				<tr>
					<td><?php echo $result_student['id']; ?></td>
					<td><?php echo ucwords($result_student['name']); ?></td>
					<td><?php echo $result_student['roll']; ?></td>
					<td><?php echo $result_student['age']; ?></td>
					<td><?php echo $result_student['email']; ?></td>
					<td><?php echo ucwords($result_student['city']); ?></td>
					<td><?php echo $result_student['contact']; ?></td>
					<td><img style="width: 100px;" src="student_images/<?php echo $result_student['photo']; ?>" alt="iamge"></td>
				</tr>
				
				<?php } ?>
				<?php } else{ ?>

				<tr>
					<td colspan="9" class="text-center">No Data To Show</td>
				</tr>

				<?php } ?>

			</tbody>
		</table>
	</div>
	<!-- Table End -->

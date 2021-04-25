
<h1 class="text-primary"><i class="fas fa-users"></i> All Students <small style="color: #000";>All Students</small></h1>

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">
			<a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt" style="margin-top: 6px;
			letter-spacing: 5px;"></i> Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">
			<i class="fas fa-users" style="margin-top: 5px;
			letter-spacing: 5px;"></i> All Students</li>
		</ol>
	</nav>


<!-- Table Start -->
	<div class="table-responsive mt-5 mb-5">
		<table id="data" class="table table-hover table-bordered table-striped">
			<thead>
				<tr>
					<th>Serial</th>
					<th>Name</th>
					<th>ID</th>
					<th>Age</th>
					<th>Email</th>
					<th>City</th>
					<th>Contact</th>
					<th>Semester</th>
					<th>Photo</th>
					<th>Action</th>
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
					<td><?php echo $result_student['class']; ?></td>
					<td><img style="width: 100px; height: 100px;object-fit: contain;" src="student_images/<?php echo $result_student['photo']; ?>" alt="iamge"></td>
					<td>
						<a href="index.php?page=update-student&id=<?php echo base64_encode($result_student['id']);?>" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a><br><br>
						<a href="delete-student.php?id=<?php echo base64_encode($result_student['id']);?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
					</td>
				</tr>
				
				<?php } ?>
				<?php } else{ ?>

				<tr>
					<td colspan="10" class="text-center">No Data To Show</td>
				</tr>

				<?php } ?>

			</tbody>
		</table>
	</div>
<!-- Table End -->
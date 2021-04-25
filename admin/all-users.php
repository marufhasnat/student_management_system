
<h1 class="text-primary"><i class="fas fa-users"></i> All Users <small style="color: #000";>All Users</small></h1>

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">
			<a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt" style="margin-top: 6px;
			letter-spacing: 5px;"></i> Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">
			<i class="fas fa-users" style="margin-top: 5px;
			letter-spacing: 5px;"></i> All Userss</li>
		</ol>
	</nav>


<!-- Table Start -->
	<div class="table-responsive mt-5 mb-5">
		<table id="data" class="table table-hover table-bordered table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Age</th>
					<th>Mobile</th>
					<th>Email</th>
					<th>Username</th>
					<th>Photo</th>
				</tr>
			</thead>
			<tbody>
				
				<?php 

					$selectSql = "SELECT * FROM users";
					$result_show = $conn -> query($selectSql);

					if($result_show -> num_rows > 0){  

					while($result_student = $result_show -> fetch_assoc()){ ?>

				<tr>
					<td><?php echo ucwords($result_student['name']); ?></td>
					<td><?php echo $result_student['age']; ?></td>
					<td><?php echo $result_student['mobile']; ?></td>
					<td><?php echo $result_student['email']; ?></td>
					<td><?php echo $result_student['username']; ?></td>
					<td><img style="width: 100px;" src="images/<?php echo $result_student['photo']; ?>" alt="iamge"></td>
				</tr>
				
				<?php } ?>
				<?php } else{ ?>

				<tr>
					<td colspan="6" class="text-center">No Data To Show</td>
				</tr>

				<?php } ?>

			</tbody>
		</table>
	</div>
<!-- Table End -->
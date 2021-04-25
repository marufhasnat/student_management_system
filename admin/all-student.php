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
					<td><?php echo $result_student['name']; ?></td>
					<td><?php echo $result_student['roll']; ?></td>
					<td><?php echo $result_student['age']; ?></td>
					<td><?php echo $result_student['email']; ?></td>
					<td><?php echo $result_student['city']; ?></td>
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
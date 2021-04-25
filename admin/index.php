
<?php 

session_start();

require_once './connection.php';

if(!isset($_SESSION['user_login'])){
	header('location: login.php');
}

?>


<!-- <a href="logout.php">Logout</a> -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- Font Awesome Links -->
	<script src="https://kit.fontawesome.com/b1ffafec85.js" crossorigin="anonymous"></script>
	
	<!-- Plugin CSS -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    

    <title>SMS</title>
  </head>
  <body>


	<header style="background: rgb(248, 249, 250);">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="#">SMS</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#"><i class="fas fa-user"></i> Welcome To The Dashboard <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="registration.php"><i class="fas fa-user-plus"></i> Add User</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=user-profile"><i class="fas fa-user"></i> Profile</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="logout.php"><i class="fas fa-power-off"></i> Logout</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>



	<div class="container-fluid mt-4">
		<div class="row">
			<div class="col-sm-3">
				<div class="list-group">
					<a href="index.php?page=dashboard" class="list-group-item list-group-item-action active">
						<i class="fas fa-tachometer-alt"></i> Dashboard
					</a>
					<a href="index.php?page=add-student" class="list-group-item list-group-item-action">
						<i class="fas fa-user-plus"></i>  Add Student</a>
					<a href="index.php?page=all-students" class="list-group-item list-group-item-action">
						<i class="fas fa-user-graduate"></i> All Students</a>
					<a href="index.php?page=all-users" class="list-group-item list-group-item-action">
						<i class="fas fa-users"></i> All Users</a>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="content" style="min-height: 650px;">
					
				<?php 

				if(isset($_GET['page'])){
					$page = $_GET['page'].'.php';
				}
				else{
					$page = "dashboard.php";
				}
					
				if(file_exists($page)){
					require_once $page;
				} else{
					require_once '404.php';
				}
					
				?>

				</div>
				
			</div>
		</div>
	</div>


	<footer class="footer-area" style="background: rgb(0, 123, 255); text-align: center;padding: 20px 0; color: #fff;">
		<p style="margin: 0;">Copyright &copy; 2019 - <?php echo date('Y') ?> All Rights Reserved</p>
	</footer>

    


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
	<script src="js/script.js "></script>


  </body>
</html>
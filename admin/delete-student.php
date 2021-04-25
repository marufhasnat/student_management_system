<?php 
	
require_once "./connection.php";	

$delete_id = base64_decode($_GET['id']);

$deleteSql = "DELETE FROM students_info WHERE id = $delete_id";

$delete_student = $conn -> query($deleteSql);

header('location: index.php?page=all-students');

?>
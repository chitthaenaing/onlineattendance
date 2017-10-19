<?php 
require 'functions.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	//To get DB Connection
	$conn = connect();

	$query = 'Delete from student where student_id=:id';
	$binding = array(':id'=>$id);
	$stmt = $conn ->prepare($query);
	$stmt->execute($binding);
	header("location:studentManagement.php");
}

?>
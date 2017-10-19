<?php 
require 'functions.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	//To get DB Connection
	$conn = connect();

	$query = 'Delete from user_accounts where account_id=:id';
	$binding = array(':id'=>$id);
	$stmt = $conn ->prepare($query);
	$stmt->execute($binding);
	header("location:userAccounts.php");
}

?>
<?php

if(isset($_POST['updateStudent'])){

	$studentName = $_POST['studentName'];
	$batchId = $_POST['batch'];

	$updateStudentQuery = 'Update student set student_name=:studentName,batch_id=:batchId where student_id=:studentId';

	$updateStudentBinding = array(
		':studentName'=>$studentName,
		':batchId' => $batchId,
		':studentId'=>$id
		);
	$rsUpdateQuery = $conn->prepare($updateStudentQuery);
	$rsUpdateQuery->execute($updateStudentBinding);
}
?>
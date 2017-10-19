<?php 

	//To check updateBatch variable 
		if(isset($_POST['updateBatch'])){
			$batchName = $_POST['batchname'];
			$semesterId = $_POST['semester'];
			$year = $_POST['academic_year'];
			$startDate = $_POST['start_date'];
			$endDate = $_POST['end_date'];
			$updateBatchQuery = 'Update batch set batch_name=:batchName,semester_id=:semesterId,year=:year,start_date=:startDate,end_date=:endDate where batch_id=:id';

			$rsUpdateBatch = $conn->prepare($updateBatchQuery);
			$updateBatchBinding = array(
				':batchName' => $batchName,
				':semesterId' => $semesterId,
				':year' => $year,
				':startDate'=>$startDate,
				':endDate'=>$endDate,
				':id'=>$id
				);
			$rsUpdateBatch->execute($updateBatchBinding);



		}

?>
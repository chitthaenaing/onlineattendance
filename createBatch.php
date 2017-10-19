<?php
// require 'database.php';
require 'functions.php';

if(isset($_POST['createBatch'])){
  $batchname = $_POST['batchname'];
  $academic_year = $_POST['academic_year'];
  $semester = $_POST['semester'];
  $startDate=$_POST['start_date'];
  $endDate = $_POST['end_date'];
  echo $batchname;
  echo $academic_year;
  echo $semester;
  echo $startDate;
  echo $endDate;
  
  try{

  //To get DB Connection
    $conn =connect();
  
  //To put the data into the user_accounts table 
   	$query = "Insert into batch (batch_name,semester_id,year,start_date,end_date) values (:batch_name,:semester_id,:year,:start_date,:end_date)";

      $binding=array(
        ':batch_name' => $batchname,
        ':semester_id' => (int)$semester,
        ':year' => $academic_year,
        ':start_date'=>$startDate,
        ':end_date'=>$endDate
        );

      $result = insert($query,$binding,$conn);

      if($result) header("Location:batchManagement.php");
  // $db=new Database();
  // $result = $db->insert($query,$binding);


  }catch(PDOException $e){
    echo $e-getMessage();
  }
}
?>

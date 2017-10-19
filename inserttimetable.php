<?php

    require 'functions.php';

    $conn = connect();

    $mon1 = $_POST['mon1'];
     $mon2 = $_POST['mon2'];
      $mon3 = $_POST['mon3'];

    $tue1= $_POST['tue1'];
     $tue2= $_POST['tue2'];
      $tue3= $_POST['tue3'];

    $wed1 = $_POST['wed1'];
     $wed2 = $_POST['wed2'];
      $wed3 = $_POST['wed3'];

    $thu1 = $_POST['thu1'];
  	  $thu2 = $_POST['thu2'];
    	$thu3 = $_POST['thu3'];

    $fri1 = $_POST['fri1'];
      $fri2 = $_POST['fri2'];
    	$fri3 = $_POST['fri3'];

    	$batchid = $_GET['bid'];


    		$query = "Insert into timetable(batch_id,day,subject_id,time) values (:bid,:day,:sid,:time)";

    		$binding1 = array(
    			':bid' => $batchid,
    			':day' => "Monday",
    			':sid' => $mon1,
    			':time' => "1"
    			);

    		$binding2 = array(
    			':bid' => $batchid,
    			':day' => "Monday",
    			':sid' => $mon2,
    			':time' => "2"
    			);


    		$binding3 = array(
    			':bid' => $batchid,
    			':day' => "Monday",
    			':sid' => $mon3,
    			':time' => "3"
    			);

    		$binding4 = array(
    			':bid' => $batchid,
    			':day' => "Tuesday",
    			':sid' => $tue1,
    			':time' => "1"
    			);

    		$binding5 = array(
    			':bid' => $batchid,
    			':day' => "Tuesday",
    			':sid' => $tue2,
    			':time' => "2"
    			);

    		$binding6 = array(
    			':bid' => $batchid,
    			':day' => "Tuesday",
    			':sid' => $tue3,
    			':time' => "3"
    			);

    		$binding7 = array(
    			':bid' => $batchid,
    			':day' => "Wednesday",
    			':sid' => $wed1,
    			':time' => "1"
    			);

    		$binding8 = array(
    			':bid' => $batchid,
    			':day' => "Wednesday",
    			':sid' => $wed2,
    			':time' => "2"
    			);

    		$binding9 = array(
    			':bid' => $batchid,
    			':day' => "Wednesday",
    			':sid' => $wed3,
    			':time' => "3"
    			);

    		$binding10 = array(
    			':bid' => $batchid,
    			':day' => "Thursday",
    			':sid' => $thu1,
    			':time' => "1"
    			);

    		$binding11 = array(
    			':bid' => $batchid,
    			':day' => "Thursday",
    			':sid' => $thu2,
    			':time' => "2"
    			);

    		$binding12 = array(
    			':bid' => $batchid,
    			':day' => "Thursday",
    			':sid' => $thu3,
    			':time' => "3"
    			);

    		$binding13 = array(
    			':bid' => $batchid,
    			':day' => "Friday",
    			':sid' => $fri1,
    			':time' => "1"
    			);

    		$binding14 = array(
    			':bid' => $batchid,
    			':day' => "Friday",
    			':sid' => $fri2,
    			':time' => "2"
    			);

    		$binding15 = array(
    			':bid' => $batchid,
    			':day' => "Friday",
    			':sid' => $fri3,
    			':time' => "3"
    			);


    		$result = insert($query,$binding1,$conn);
    		$result = insert($query,$binding2,$conn);
    		$result = insert($query,$binding3,$conn);
    		$result = insert($query,$binding4,$conn);
    		$result = insert($query,$binding5,$conn);
    		$result = insert($query,$binding6,$conn);
    		$result = insert($query,$binding7,$conn);
    		$result = insert($query,$binding8,$conn);
    		$result = insert($query,$binding9,$conn);
    		$result = insert($query,$binding10,$conn);
    		$result = insert($query,$binding11,$conn);
    		$result = insert($query,$binding12,$conn);
    		$result = insert($query,$binding13,$conn);
    		$result = insert($query,$binding14,$conn);
    		$result = insert($query,$binding15,$conn);
            header("location:batchManagement.php");
?>  
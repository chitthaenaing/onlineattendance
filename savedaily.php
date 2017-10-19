<?php
 // require 'functions.php';

 //    $conn = connect();

// $batchid = $_GET['batch'];
// $subject = $_GET['sub'];
// $day = $_GET['day'];
// $date = $_GET['date'];
// $time = $_GET['time'];

 $query = "Select * from student where batch_id='$batchid'";
    $studentresult = get($query,$conn);

    $students = $studentresult->fetchAll();

    $i=0;

    foreach ($students as $row)
    {
    	$stuid[$i] = $row['student_id'];
    	$status[$i] = $_POST[$stuid[$i]."n"];
    	if($status[$i]=="present")
    	$statusval[$i] = 1;
   		else if($status[$i]=="absent")
    	$statusval[$i] = 0;
    	$remark[$i] = htmlspecialchars($_POST[$stuid[$i]."t"]);
    	$query = "Insert into dailyattendance(student_id,subject_id,day,date,status,time,d_remark) values('$stuid[$i]','$subid','$day','$date','$statusval[$i]','$time','$remark[$i]')";
    	$conn->exec($query);

    	$i++;
    }

   echo "<script>alert('Saved Successfully for $time');</script>";
 
?>
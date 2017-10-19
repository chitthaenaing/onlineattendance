<?php
	require 'functions.php';
    $conn = connect();

    $date = date('Y-m-d');
    $timestamp = strtotime($date);
    $day = date('l', $timestamp);

    $studentid = $_GET['id'];

    $query = "Select * from dailyattendance where student_id='$studentid' and day='$day'";
    $result = get($query,$conn);

    $i=0;
    while($row=$result->fetch()):
   	$i++;
    $report[$i]=$row['status'];
    $subject[$i]=$row['subject_id'];
 
   	endwhile;

   	if($i==0)
   	{
   		$time1 = "Not Yet!";
   		$time2 = "Not Yet!";
   		$time3 = "Not Yet!";
   	}
   	else if($i==1)
   	{
   		if($report[1]==1)
   			$time1 = "Present";
   		else
   			$time1 = "Absent";
   		$time2 = "Not Yet!";
   		$time3 = "Not Yet!";
   	}
   	else if($i==2)
   	{
   		if($report[1]==1)
   			$time1 = "Present";
   		else
   			$time1 = "Absent";
   		if($report[2]==1)
   			$time2 = "Present";
   		else
   			$time2 = "Absent";
   		$time3 = "Not Yet!";
   	}
   	else if($i==3)
   	{
   		if($report[1]==1)
   			$time1 = "Present";
   		else
   			$time1 = "Absent";
   		if($report[2]==1)
   			$time2 = "Present";
   		else
   			$time2 = "Absent";
   		if($report[3]==1)
   			$time3 = "Present";
   		else
   			$time3 = "Absent";
   	}

   	$query = "select * from student where student_id='$studentid'";
	$result = get($query,$conn);

 	while($row = $result->fetch()):
 		$studentname = $row['student_name'];
 	endwhile;

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
   <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/css/bootstrap.min.css">
</head>
<body>
<h1 style="text-align: center;"><?php echo $studentname;?>'s Daily Attendance</h1>

<div class="row">
  <div class="col-lg-4" style="height: 100px;text-align: center;"><h1 style="color: black;">First time</h1><img src="images/<?php if($time1=='Present') echo 'present.png'; else if($time1=='Absent') echo 'absent.png'; else if($time3=='Not Yet!') echo 'notyet.png'; ?>"></div>
   <div class="col-lg-4" style="height: 100px;text-align: center;"><h1 style="color: black;">Second time</h1><img src="images/<?php if($time2=='Present') echo 'present.png'; else if($time2=='Absent') echo 'absent.png'; else if($time3=='Not Yet!') echo 'notyet.png'; ?>"></div>
   <div class="col-lg-4" style="height: 100px;text-align: center;"><h1 style="color: black;">Third time</h1><img src="images/<?php if($time3=='Present') echo 'present.png'; else if($time3=='Absent') echo 'absent.png'; else if($time3=='Not Yet!') echo 'notyet.png'; ?>"></div>
</div>

<div class="row" style=" margin-top: 100px;margin-left: 100px;"><h3>Date :<?php echo $date; ?></h3></div>

</body>
</html>
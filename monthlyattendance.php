<?php
  session_start();
  require 'functions.php';
  require 'daycount.php';
 $conn = connect();

if($conn){
  if($_SESSION['auth'] == 1 || $_SESSION['auth'] == 3){
    $studentid = $_GET['id'];


 $query = "select * from student where student_id='$studentid'";
 $result = get($query,$conn);

  while($row = $result->fetch()):
    $batchid = $row['batch_id'];
    $studentname = $row['student_name'];
  endwhile;

  $query = "select * from batch where batch_id='$batchid'";
  $result = get($query,$conn);

  while($row = $result->fetch()):
    $startdate = $row['start_date']; //month 1 start
    $enddate = $row['end_date'];
  endwhile;

$month1 = explode('-', $startdate);
$endofmonth1 = $month1[0]."-".$month1[1]."-"."28"; //month 1 end

if($month1[1]=="01") $monthn[0]="January";   //month name decision
else if($month1[1]=="02") $monthn[0]="February";
else if($month1[1]=="03") $monthn[0]="March";
else if($month1[1]=="04") $monthn[0]="April";
else if($month1[1]=="05") $monthn[0]="May";
else if($month1[1]=="06") $monthn[0]="June";
else if($month1[1]=="07") $monthn[0]="July";
else if($month1[1]=="08") $monthn[0]="August";
else if($month1[1]=="09") $monthn[0]="September";
else if($month1[1]=="10") $monthn[0]="October";
else if($month1[1]=="11") $monthn[0]="November";
else if($month1[1]=="12") $monthn[0]="December";


$month2=$month1[1][1]+1;
if($month2<=9)

  $month2="0".$month2;

else
  $month2=$month2;

$startofmonth2 = $month1[0]."-".$month1[1]."-"."29"; //month 2 start

$endofmonth2 = $month1[0]."-".$month2."-"."28"; //month 2 end
if($month2=="01") $monthn[1]="January";   //month name decision
else if($month2=="02") $monthn[1]="February";
else if($month2=="03") $monthn[1]="March";
else if($month2=="04") $monthn[1]="April";
else if($month2=="05") $monthn[1]="May";
else if($month2=="06") $monthn[1]="June";
else if($month2=="07") $monthn[1]="July";
else if($month2=="08") $monthn[1]="August";
else if($month2=="09") $monthn[1]="September";
else if($month2=="10") $monthn[1]="October";
else if($month2=="11") $monthn[1]="November";
else if($month2=="12") $monthn[1]="December";


$month3=$month2[1]+1;
if($month3<=9)

  $month3="0".$month3;

else
  $month3=$month3;




$startofmonth3 = $month1[0]."-".$month2."-"."29"; //month 3 start

$endofmonth3 = $month1[0]."-".$month3."-"."28"; //month 3 end
if($month3=="01") $monthn[2]="January";   //month name decision
else if($month3=="02") $monthn[2]="February";
else if($month3=="03") $monthn[2]="March";
else if($month3=="04") $monthn[2]="April";
else if($month3=="05") $monthn[2]="May";
else if($month3=="06") $monthn[2]="June";
else if($month3=="07") $monthn[2]="July";
else if($month3=="08") $monthn[2]="August";
else if($month3=="09") $monthn[2]="September";
else if($month3=="10") $monthn[2]="October";
else if($month3=="11") $monthn[2]="November";
else if($month3=="12") $monthn[2]="December";


$month4=$month3[1]+1;
if($month4<=9)

  $month4="0".$month4;

else
  $month4=$month4;




$startofmonth4 = $month1[0]."-".$month3."-"."29"; //month 4 start

$endofmonth4 = $month1[0]."-".$month4."-"."28"; //month 4 end
if($month4=="01") $monthn[3]="January";   //month name decision
else if($month4=="02") $monthn[3]="February";
else if($month4=="03") $monthn[3]="March";
else if($month4=="04") $monthn[3]="April";
else if($month4=="05") $monthn[3]="May";
else if($month4=="06") $monthn[3]="June";
else if($month4=="07") $monthn[3]="July";
else if($month4=="08") $monthn[3]="August";
else if($month4=="09") $monthn[3]="September";
else if($month4=="10") $monthn[3]="October";
else if($month4=="11") $monthn[3]="November";
else if($month4=="12") $monthn[3]="December";

$month1MondayCount = MondayCount($startdate,$endofmonth1);
$month1TuesdayCount = TuesdayCount($startdate,$endofmonth1);
$month1WednesdayCount = WednesdayCount($startdate,$endofmonth1);
$month1ThursdayCount = ThursdayCount($startdate,$endofmonth1);
$month1FridayCount = FridayCount($startdate,$endofmonth1);

$month2MondayCount = MondayCount($startofmonth2,$endofmonth2);
$month2TuesdayCount = TuesdayCount($startofmonth2,$endofmonth2);
$month2WednesdayCount = WednesdayCount($startofmonth2,$endofmonth2);
$month2ThursdayCount = ThursdayCount($startofmonth2,$endofmonth2);
$month2FridayCount = FridayCount($startofmonth2,$endofmonth2);

$month3MondayCount = MondayCount($startofmonth3,$endofmonth3);
$month3TuesdayCount = TuesdayCount($startofmonth3,$endofmonth3);
$month3WednesdayCount = WednesdayCount($startofmonth3,$endofmonth3);
$month3ThursdayCount = ThursdayCount($startofmonth3,$endofmonth3);
$month3FridayCount = FridayCount($startofmonth3,$endofmonth3);

$month4MondayCount = MondayCount($startofmonth4,$endofmonth4);
$month4TuesdayCount = TuesdayCount($startofmonth4,$endofmonth4);
$month4WednesdayCount = WednesdayCount($startofmonth4,$endofmonth4);
$month4ThursdayCount = ThursdayCount($startofmonth4,$endofmonth4);
$month4FridayCount = FridayCount($startofmonth4,$endofmonth4);


  $query = "select * from batchandsubject where batch_id='$batchid'";
  $result = get($query,$conn);

  $i=0;

  while ($row=$result->fetch()):
    $sub[$i]=$row['subject_id'];
    $i++;
  endwhile;


  $mondaycountsub1=0;
    $mondaycountsub2=0;
      $mondaycountsub3=0;
        $mondaycountsub4=0;

  $query = "select * from timetable where batch_id='$batchid' and day='Monday'";
  $result = get($query,$conn);

  while ($row=$result->fetch()):
 
  if($row['subject_id']==$sub[0])
    $mondaycountsub1++;
  else if($row['subject_id']==$sub[1])
    $mondaycountsub2++;
  else if($row['subject_id']==$sub[2])
    $mondaycountsub3++;
  else
    $mondaycountsub4++;
  endwhile;
  

$tuesdaycountsub1=0;
    $tuesdaycountsub2=0;
      $tuesdaycountsub3=0;
        $tuesdaycountsub4=0;
$query = "select * from timetable where batch_id='$batchid' and day='Tuesday'";
  $result = get($query,$conn);

  while ($row=$result->fetch()):
 
  if($row['subject_id']==$sub[0])
    $tuesdaycountsub1++;
  else if($row['subject_id']==$sub[1])
    $tuesdaycountsub2++;
  else if($row['subject_id']==$sub[2])
    $tuesdaycountsub3++;
  else
    $tuesdaycountsub4++;
  endwhile;


$wednesdaycountsub1=0;
    $wednesdaycountsub2=0;
      $wednesdaycountsub3=0;
        $wednesdaycountsub4=0;

  $query = "select * from timetable where batch_id='$batchid' and day='Wednesday'";
  $result = get($query,$conn);

  while ($row=$result->fetch()):
 
  if($row['subject_id']==$sub[0])
    $wednesdaycountsub1++;
  else if($row['subject_id']==$sub[1])
    $wednesdaycountsub2++;
  else if($row['subject_id']==$sub[2])
    $wednesdaycountsub3++;
  else
    $wednesdaycountsub4++;
  endwhile;



$thursdaycountsub1=0;
    $thursdaycountsub2=0;
      $thursdaycountsub3=0;
        $thursdaycountsub4=0;
  $query = "select * from timetable where batch_id='$batchid' and day='Thursday'";
  $result = get($query,$conn);

  while ($row=$result->fetch()):
 
  if($row['subject_id']==$sub[0])
    $thursdaycountsub1++;
  else if($row['subject_id']==$sub[1])
    $thursdaycountsub2++;
  else if($row['subject_id']==$sub[2])
    $thursdaycountsub3++;
  else
    $thursdaycountsub4++;
  endwhile;



$fridaycountsub1=0;
    $fridaycountsub2=0;
      $fridaycountsub3=0;
        $fridaycountsub4=0;
  $query = "select * from timetable where batch_id='$batchid' and day='Friday'";
  $result = get($query,$conn);

  while ($row=$result->fetch()):
 
  if($row['subject_id']==$sub[0])
    $fridaycountsub1++;
  else if($row['subject_id']==$sub[1])
    $fridaycountsub2++;
  else if($row['subject_id']==$sub[2])
    $fridaycountsub3++;
  else
    $fridaycountsub4++;
  endwhile;


  $totalmonth1sub1 = ($mondaycountsub1*$month1MondayCount)+($tuesdaycountsub1*$month1TuesdayCount)+($wednesdaycountsub1*$month1WednesdayCount)+($thursdaycountsub1*$month1ThursdayCount)+($fridaycountsub1*$month1FridayCount);
  $totalmonth1sub2 = ($mondaycountsub2*$month1MondayCount)+($tuesdaycountsub2*$month1TuesdayCount)+($wednesdaycountsub2*$month1WednesdayCount)+($thursdaycountsub2*$month1ThursdayCount)+($fridaycountsub2*$month1FridayCount);
  $totalmonth1sub3 = ($mondaycountsub3*$month1MondayCount)+($tuesdaycountsub3*$month1TuesdayCount)+($wednesdaycountsub3*$month1WednesdayCount)+($thursdaycountsub3*$month1ThursdayCount)+($fridaycountsub3*$month1FridayCount);
  $totalmonth1sub4 = ($mondaycountsub4*$month1MondayCount)+($tuesdaycountsub4*$month1TuesdayCount)+($wednesdaycountsub4*$month1WednesdayCount)+($thursdaycountsub4*$month1ThursdayCount)+($fridaycountsub4*$month1FridayCount);



  $totalmonth2sub1 = ($mondaycountsub1*$month2MondayCount)+($tuesdaycountsub1*$month2TuesdayCount)+($wednesdaycountsub1*$month2WednesdayCount)+($thursdaycountsub1*$month2ThursdayCount)+($fridaycountsub1*$month2FridayCount);
  $totalmonth2sub2 = ($mondaycountsub2*$month2MondayCount)+($tuesdaycountsub2*$month2TuesdayCount)+($wednesdaycountsub2*$month2WednesdayCount)+($thursdaycountsub2*$month2ThursdayCount)+($fridaycountsub2*$month2FridayCount);
  $totalmonth2sub3 = ($mondaycountsub3*$month2MondayCount)+($tuesdaycountsub3*$month2TuesdayCount)+($wednesdaycountsub3*$month2WednesdayCount)+($thursdaycountsub3*$month2ThursdayCount)+($fridaycountsub3*$month2FridayCount);
  $totalmonth2sub4 = ($mondaycountsub4*$month2MondayCount)+($tuesdaycountsub4*$month2TuesdayCount)+($wednesdaycountsub4*$month2WednesdayCount)+($thursdaycountsub4*$month2ThursdayCount)+($fridaycountsub4*$month2FridayCount);


  $totalmonth3sub1 = ($mondaycountsub1*$month3MondayCount)+($tuesdaycountsub1*$month3TuesdayCount)+($wednesdaycountsub1*$month3WednesdayCount)+($thursdaycountsub1*$month3ThursdayCount)+($fridaycountsub1*$month3FridayCount);
  $totalmonth3sub2 = ($mondaycountsub2*$month3MondayCount)+($tuesdaycountsub2*$month3TuesdayCount)+($wednesdaycountsub2*$month3WednesdayCount)+($thursdaycountsub2*$month3ThursdayCount)+($fridaycountsub2*$month3FridayCount);
  $totalmonth3sub3 = ($mondaycountsub3*$month3MondayCount)+($tuesdaycountsub3*$month3TuesdayCount)+($wednesdaycountsub3*$month3WednesdayCount)+($thursdaycountsub3*$month3ThursdayCount)+($fridaycountsub3*$month3FridayCount);
  $totalmonth3sub4 = ($mondaycountsub4*$month3MondayCount)+($tuesdaycountsub4*$month3TuesdayCount)+($wednesdaycountsub4*$month3WednesdayCount)+($thursdaycountsub4*$month3ThursdayCount)+($fridaycountsub4*$month3FridayCount);


  $totalmonth4sub1 = ($mondaycountsub1*$month4MondayCount)+($tuesdaycountsub1*$month4TuesdayCount)+($wednesdaycountsub1*$month4WednesdayCount)+($thursdaycountsub1*$month4ThursdayCount)+($fridaycountsub1*$month4FridayCount);
  $totalmonth4sub2 = ($mondaycountsub2*$month4MondayCount)+($tuesdaycountsub2*$month4TuesdayCount)+($wednesdaycountsub2*$month4WednesdayCount)+($thursdaycountsub2*$month4ThursdayCount)+($fridaycountsub2*$month4FridayCount);
  $totalmonth4sub3 = ($mondaycountsub3*$month4MondayCount)+($tuesdaycountsub3*$month4TuesdayCount)+($wednesdaycountsub3*$month4WednesdayCount)+($thursdaycountsub3*$month4ThursdayCount)+($fridaycountsub3*$month4FridayCount);
  $totalmonth4sub4 = ($mondaycountsub4*$month4MondayCount)+($tuesdaycountsub4*$month4TuesdayCount)+($wednesdaycountsub4*$month4WednesdayCount)+($thursdaycountsub4*$month4ThursdayCount)+($fridaycountsub4*$month4FridayCount);



//Month 1 
  $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[0]' and date>='$startdate' and date<='$endofmonth1' and status='1'";
  $result = get($query,$conn);
  $presentmonth1sub1=0;
  while($row=$result->fetch()):
    $presentmonth1sub1++;
  endwhile;
  $sub1month1percentage = ($presentmonth1sub1/$totalmonth1sub1)*100;


  $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[1]' and date>='$startdate' and date<='$endofmonth1' and status='1'";
  $result = get($query,$conn);
  $presentmonth1sub2=0;
  while($row=$result->fetch()):
    $presentmonth1sub2++;
  endwhile;
  $sub2month1percentage = ($presentmonth1sub2/$totalmonth1sub2)*100;


   $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[2]' and date>='$startdate' and date<='$endofmonth1' and status='1'";
  $result = get($query,$conn);
  $presentmonth1sub3=0;
  while($row=$result->fetch()):
    $presentmonth1sub3++;
  endwhile;
  $sub3month1percentage = ($presentmonth1sub3/$totalmonth1sub3)*100;


   $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[3]' and date>='$startdate' and date<='$endofmonth1' and status='1'";
  $result = get($query,$conn);
  $presentmonth1sub4=0;
  while($row=$result->fetch()):
    $presentmonth1sub4++;
  endwhile;
  $sub4month1percentage = ($presentmonth1sub4/$totalmonth1sub4)*100;


//Month 1 Finish


  //Month 2 
  $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[0]' and date>='$startofmonth2' and date<='$endofmonth2' and status='1'";
  $result = get($query,$conn);
  $presentmonth2sub1=0;
  while($row=$result->fetch()):
    $presentmonth2sub1++;
  endwhile;
  $sub1month2percentage = ($presentmonth2sub1/$totalmonth2sub1)*100;


  $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[1]' and date>='$startofmonth2' and date<='$endofmonth2' and status='1'";
  $result = get($query,$conn);
  $presentmonth2sub2=0;
  while($row=$result->fetch()):
    $presentmonth2sub2++;
  endwhile;
  $sub2month2percentage = ($presentmonth2sub2/$totalmonth2sub2)*100;


   $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[2]' and date>='$startofmonth2' and date<='$endofmonth2' and status='1'";
  $result = get($query,$conn);
  $presentmonth2sub3=0;
  while($row=$result->fetch()):
    $presentmonth2sub3++;
  endwhile;
  $sub3month2percentage = ($presentmonth2sub3/$totalmonth2sub3)*100;


   $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[3]' and date>='$startofmonth2' and date<='$endofmonth2' and status='1'";
  $result = get($query,$conn);
  $presentmonth2sub4=0;
  while($row=$result->fetch()):
    $presentmonth2sub4++;
  endwhile;
  $sub4month2percentage = ($presentmonth2sub4/$totalmonth2sub4)*100;


//Month 2 Finish


  //Month 3 
  $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[0]' and date>='$startofmonth3' and date<='$endofmonth3' and status='1'";
  $result = get($query,$conn);
  $presentmonth3sub1=0;
  while($row=$result->fetch()):
    $presentmonth3sub1++;
  endwhile;
  $sub1month3percentage = ($presentmonth3sub1/$totalmonth3sub1)*100;


  $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[1]' and date>='$startofmonth3' and date<='$endofmonth3' and status='1'";
  $result = get($query,$conn);
  $presentmonth3sub2=0;
  while($row=$result->fetch()):
    $presentmonth3sub2++;
  endwhile;
  $sub2month3percentage = ($presentmonth3sub2/$totalmonth3sub2)*100;


   $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[2]' and date>='$startofmonth3' and date<='$endofmonth3' and status='1'";
  $result = get($query,$conn);
  $presentmonth3sub3=0;
  while($row=$result->fetch()):
    $presentmonth3sub3++;
  endwhile;
  $sub3month3percentage = ($presentmonth3sub3/$totalmonth3sub3)*100;


   $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[3]' and date>='$startofmonth3' and date<='$endofmonth3' and status='1'";
  $result = get($query,$conn);
  $presentmonth3sub4=0;
  while($row=$result->fetch()):
    $presentmonth3sub4++;
  endwhile;
  $sub4month3percentage = ($presentmonth3sub4/$totalmonth3sub4)*100;


  //Month 3 Finish



  //Month 4 
  $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[0]' and date>='$startofmonth4' and date<='$endofmonth4' and status='1'";
  $result = get($query,$conn);
  $presentmonth4sub1=0;
  while($row=$result->fetch()):
    $presentmonth4sub1++;
  endwhile;
  $sub1month4percentage = ($presentmonth4sub1/$totalmonth4sub1)*100;


  $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[1]' and date>='$startofmonth4' and date<='$endofmonth4' and status='1'";
  $result = get($query,$conn);
  $presentmonth4sub2=0;
  while($row=$result->fetch()):
    $presentmonth4sub2++;
  endwhile;
  $sub2month4percentage = ($presentmonth4sub2/$totalmonth4sub2)*100;


   $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[2]' and date>='$startofmonth4' and date<='$endofmonth4' and status='1'";
  $result = get($query,$conn);
  $presentmonth4sub3=0;
  while($row=$result->fetch()):
    $presentmonth4sub3++;
  endwhile;
  $sub3month4percentage = ($presentmonth4sub3/$totalmonth4sub3)*100;


   $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[3]' and date>='$startofmonth4' and date<='$endofmonth4' and status='1'";
  $result = get($query,$conn);
  $presentmonth4sub4=0;
  while($row=$result->fetch()):
    $presentmonth4sub4++;
  endwhile;
  $sub4month4percentage = ($presentmonth4sub4/$totalmonth4sub4)*100;


//Month 4 Finish



$query = "select * from subject where subject_id='$sub[0]' OR  subject_id='$sub[1]' OR  subject_id='$sub[2]' OR  subject_id='$sub[3]'";
  $result = get($query,$conn);

  $i=0;

  while ($row=$result->fetch()):
    $subname[$i]=$row['subject_name'];
    $i++;
  endwhile;
  }else{
    header("Location:../login/index.php");
  }
}
 

  

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
   <link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<style type="text/css">
		table th
		{
			padding: 10px;
			width: 200px;
			color:green;
		}
		table td
		{
			padding :5px ;

		}
		.progress
		{
			width: 70%;
		}
	</style>
</head>
<body>
<table border="1">
	<th style="color:red"><?php echo $studentname; ?></th>
	<th><?php echo $subname[0]; ?></th>
	<th><?php echo $subname[1]; ?></th>
	<th><?php echo $subname[2]; ?></th>
	<th><?php echo $subname[3]; ?></th>

	<tr><td><?php echo $monthn[0]; ?></td><td><?php echo round($sub1month1percentage,2)."%"; ?></td><td><?php echo round($sub2month1percentage,2)."%"; ?></td><td><?php echo round($sub3month1percentage,2)."%"; ?></td><td><?php echo round($sub4month1percentage,2)."%"; ?></td></tr>
	<tr><td><?php echo $monthn[1]; ?></td><td><?php echo round($sub1month2percentage,2)."%"; ?></td><td><?php echo round($sub2month2percentage,2)."%"; ?></td><td><?php echo round($sub3month2percentage,2)."%"; ?></td><td><?php echo round($sub4month2percentage,2)."%"; ?></td></tr>
	<tr><td><?php echo $monthn[2]; ?></td><td><?php echo round($sub1month3percentage,2)."%"; ?></td><td><?php echo round($sub2month3percentage,2)."%"; ?></td><td><?php echo round($sub3month3percentage,2)."%"; ?></td><td><?php echo round($sub4month3percentage,2)."%"; ?></td></tr>
	<tr><td><?php echo $monthn[3]; ?></td><td><?php echo round($sub1month4percentage,2)."%"; ?></td><td><?php echo round($sub2month4percentage,2)."%"; ?></td><td><?php echo round($sub3month4percentage,2)."%"; ?></td><td><?php echo round($sub4month4percentage,2)."%"; ?></td></tr>
</table>


</body>
</html>
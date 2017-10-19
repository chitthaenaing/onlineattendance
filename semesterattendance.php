<?php session_start(); 

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
        $semesterid = $row['semester_id'];
    endwhile;



    

$MondayCount = MondayCount($startdate,$enddate);
$TuesdayCount = TuesdayCount($startdate,$enddate);
$WednesdayCount = WednesdayCount($startdate,$enddate);
$ThursdayCount = ThursdayCount($startdate,$enddate);
$FridayCount = FridayCount($startdate,$enddate);

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



    $totalsub1 = ($mondaycountsub1*$MondayCount)+($tuesdaycountsub1*$TuesdayCount)+($wednesdaycountsub1*$WednesdayCount)+($thursdaycountsub1*$ThursdayCount)+($fridaycountsub1*$FridayCount);
  $totalsub2 = ($mondaycountsub2*$MondayCount)+($tuesdaycountsub2*$TuesdayCount)+($wednesdaycountsub2*$WednesdayCount)+($thursdaycountsub2*$ThursdayCount)+($fridaycountsub2*$FridayCount);
  $totalsub3 = ($mondaycountsub3*$MondayCount)+($tuesdaycountsub3*$TuesdayCount)+($wednesdaycountsub3*$WednesdayCount)+($thursdaycountsub3*$ThursdayCount)+($fridaycountsub3*$FridayCount);
  $totalsub4 = ($mondaycountsub4*$MondayCount)+($tuesdaycountsub4*$TuesdayCount)+($wednesdaycountsub4*$WednesdayCount)+($thursdaycountsub4*$ThursdayCount)+($fridaycountsub4*$FridayCount);


  $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[0]' and date>='$startdate' and date<='$enddate' and status='1'";
  $result = get($query,$conn);
  $presentsub1=0;
  while($row=$result->fetch()):
    $presentsub1++;
  endwhile;
  $sub1percentage = ($presentsub1/$totalsub1)*100;

  $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[1]' and date>='$startdate' and date<='$enddate' and status='1'";
  $result = get($query,$conn);
  $presentsub2=0;
  while($row=$result->fetch()):
    $presentsub2++;
  endwhile;
  $sub2percentage = ($presentsub2/$totalsub2)*100;


   $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[2]' and date>='$startdate' and date<='$enddate' and status='1'";
  $result = get($query,$conn);
  $presentsub3=0;
  while($row=$result->fetch()):
    $presentsub3++;
  endwhile;
  $sub3percentage = ($presentsub3/$totalsub3)*100;


   $query = "Select * from dailyattendance where student_id='$studentid' and subject_id='$sub[3]' and date>='$startdate' and date<='$enddate' and status='1'";
  $result = get($query,$conn);
  $presentsub4=0;
  while($row=$result->fetch()):
    $presentsub4++;
  endwhile;
  $sub4percentage = ($presentsub4/$totalsub4)*100;



$query = "select * from subject where subject_id='$sub[0]' OR  subject_id='$sub[1]' OR  subject_id='$sub[2]' OR  subject_id='$sub[3]'";
  $result = get($query,$conn);

  $i=0;

  while ($row=$result->fetch()):
    $subname[$i]=$row['subject_name'];
    $i++;
  endwhile;



    }else{
        //To redirect the login page
        header("Location:index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <title>Online Student Attendance System</title>
    <meta name="viewport" content="width=device-width, initkial-scale=1">
    <link rel="shortcut icon" href="/imc.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery-1.11.1.min.js"></script>
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
    </style>

   
   
</head>
<body>
    <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <?php include 'sidebar.php';?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
  
            <div class="container">
           
            <p id="projectname">Attendance Report</p>
            
            <table class="table" border="1">

            <th></th>
            <th><?php echo $subname[0]; ?></th>
            <th><?php echo $subname[1]; ?></th>
            <th><?php echo $subname[2]; ?></th>
            <th><?php echo $subname[3]; ?></th>

            <tr><td><?php echo $studentname; ?></td><td><?php echo round($sub1percentage,2)."%"; ?></td><td><?php echo round($sub2percentage,2)."%"; ?></td><td><?php echo round($sub3percentage,2)."%"; ?></td><td><?php echo round($sub4percentage,2)."%"; ?></td></tr>
    </table>

            
            </div>
        
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
</body>
</html>

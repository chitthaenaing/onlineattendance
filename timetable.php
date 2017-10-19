<?php session_start(); 

require 'functions.php';

$conn = connect();
if($conn){
    if($_SESSION['auth']){
     $batchid = $_GET['id'];
 $day1 = "Monday";
 $day2 = "Tuesday";
 $day3 = "Wednesday";
 $day4 = "Thursday";
 $day5 = "Friday";

 $query = "Select * from batchandsubject where batch_id='$batchid'";
 $result = get($query,$conn);

 $subrow=$result->fetchAll();
 $i=0; 
 foreach ($subrow as $row)
 {
    $subid[$i]=$row['subject_id'];
    $i++;
 }

 $query = "Select * from subject where subject_id='$subid[0]' OR subject_id='$subid[1]' OR subject_id='$subid[2]' OR subject_id='$subid[3]'";
 $result = get($query,$conn);
 $subrow=$result->fetchAll();
 $i=0; 
 foreach ($subrow as $row)
 {
    $sub[$i]=$row['subject_name'];
    $i++;
 }

    
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
           
            <p id="projectname">Batch Time Table</p>

           
            <div class="row">
            <div class="col-md-12">
            <form action="inserttimetable.php?bid=<?php echo $batchid;?>" method="post">
                <table class="table">
                <thead>
                    <th></th>
                    <th>Time 1</th>
                    <th>Time 2</th>
                    <th>Time 3</th> 
                </thead>

                <tbody>
                    <tr><td>Monday</td>
                    <td><select name="mon1" class="form-control"><option disabled selected>Choose a subject</option>
                                <option value=<?php echo $subid[0]?>><?php echo $sub[0]?></option>
                                <option value=<?php echo $subid[1]?>><?php echo $sub[1]?></option>
                                <option value=<?php echo $subid[2]?>><?php echo $sub[2]?></option>
                                <option value=<?php echo $subid[3]?>><?php echo $sub[3]?></option></select></td>
                    <td><select name="mon2" class="form-control"><option disabled selected>Choose a subject</option>
                                <option value=<?php echo $subid[0]?>><?php echo $sub[0]?></option>
                                <option value=<?php echo $subid[1]?>><?php echo $sub[1]?></option>
                                <option value=<?php echo $subid[2]?>><?php echo $sub[2]?></option>
                                <option value=<?php echo $subid[3]?>><?php echo $sub[3]?></option></select></td>
                    <td><select name="mon3" class="form-control"><option disabled selected>Choose a subject</option>
                                <option value=<?php echo $subid[0]?>><?php echo $sub[0]?></option>
                                <option value=<?php echo $subid[1]?>><?php echo $sub[1]?></option>
                                <option value=<?php echo $subid[2]?>><?php echo $sub[2]?></option>
                                <option value=<?php echo $subid[3]?>><?php echo $sub[3]?></option></select></td></tr>
                    <tr><td>Tuesday</td>
                    <td><select name="tue1" class="form-control"><option disabled selected>Choose a subject</option>
                                <option value=<?php echo $subid[0]?>><?php echo $sub[0]?></option>
                                <option value=<?php echo $subid[1]?>><?php echo $sub[1]?></option>
                                <option value=<?php echo $subid[2]?>><?php echo $sub[2]?></option>
                                <option value=<?php echo $subid[3]?>><?php echo $sub[3]?></option></select></td>
                    <td><select name="tue2" class="form-control"><option disabled selected>Choose a subject</option>
                                <option value=<?php echo $subid[0]?>><?php echo $sub[0]?></option>
                                <option value=<?php echo $subid[1]?>><?php echo $sub[1]?></option>
                                <option value=<?php echo $subid[2]?>><?php echo $sub[2]?></option>
                                <option value=<?php echo $subid[3]?>><?php echo $sub[3]?></option></select></td>
                    <td><select name="tue3" class="form-control"><option disabled selected>Choose a subject</option>
                                <option value=<?php echo $subid[0]?>><?php echo $sub[0]?></option>
                                <option value=<?php echo $subid[1]?>><?php echo $sub[1]?></option>
                                <option value=<?php echo $subid[2]?>><?php echo $sub[2]?></option>
                                <option value=<?php echo $subid[3]?>><?php echo $sub[3]?></option></select></td></tr>
                    <tr><td>Wednesday</td>
                    <td><select name="wed1" class="form-control"><option disabled selected>Choose a subject</option>
                                <option value=<?php echo $subid[0]?>><?php echo $sub[0]?></option>
                                <option value=<?php echo $subid[1]?>><?php echo $sub[1]?></option>
                                <option value=<?php echo $subid[2]?>><?php echo $sub[2]?></option>
                                <option value=<?php echo $subid[3]?>><?php echo $sub[3]?></option></select></td>
                    <td><select name="wed2" class="form-control"><option disabled selected>Choose a subject</option>
                                <option value=<?php echo $subid[0]?>><?php echo $sub[0]?></option>
                                <option value=<?php echo $subid[1]?>><?php echo $sub[1]?></option>
                                <option value=<?php echo $subid[2]?>><?php echo $sub[2]?></option>
                                <option value=<?php echo $subid[3]?>><?php echo $sub[3]?></option></select></td>
                    <td><select name="wed3" class="form-control"><option disabled selected>Choose a subject</option>
                                <option value=<?php echo $subid[0]?>><?php echo $sub[0]?></option>
                                <option value=<?php echo $subid[1]?>><?php echo $sub[1]?></option>
                                <option value=<?php echo $subid[2]?>><?php echo $sub[2]?></option>
                                <option value=<?php echo $subid[3]?>><?php echo $sub[3]?></option></select></td></tr>
                    <tr><td>Thursday</td>
                    <td><select name="thu1" class="form-control"><option disabled selected>Choose a subject</option>
                                <option value=<?php echo $subid[0]?>><?php echo $sub[0]?></option>
                                <option value=<?php echo $subid[1]?>><?php echo $sub[1]?></option>
                                <option value=<?php echo $subid[2]?>><?php echo $sub[2]?></option>
                                <option value=<?php echo $subid[3]?>><?php echo $sub[3]?></option></select></td>
                    <td><select name="thu2" class="form-control"><option disabled selected>Choose a subject</option>
                                <option value=<?php echo $subid[0]?>><?php echo $sub[0]?></option>
                                <option value=<?php echo $subid[1]?>><?php echo $sub[1]?></option>
                                <option value=<?php echo $subid[2]?>><?php echo $sub[2]?></option>
                                <option value=<?php echo $subid[3]?>><?php echo $sub[3]?></option></select></td>
                    <td><select name="thu3" class="form-control"><option disabled selected>Choose a subject</option>
                                <option value=<?php echo $subid[0]?>><?php echo $sub[0]?></option>
                                <option value=<?php echo $subid[1]?>><?php echo $sub[1]?></option>
                                <option value=<?php echo $subid[2]?>><?php echo $sub[2]?></option>
                                <option value=<?php echo $subid[3]?>><?php echo $sub[3]?></option></select></td></tr>
                    <tr><td>Friday</td>
                    <td><select name="fri1" class="form-control"><option disabled selected>Choose a subject</option>
                                <option value=<?php echo $subid[0]?>><?php echo $sub[0]?></option>
                                <option value=<?php echo $subid[1]?>><?php echo $sub[1]?></option>
                                <option value=<?php echo $subid[2]?>><?php echo $sub[2]?></option>
                                <option value=<?php echo $subid[3]?>><?php echo $sub[3]?></option></select></td>
                    <td><select name="fri2" class="form-control"><option disabled selected>Choose a subject</option>
                                <option value=<?php echo $subid[0]?>><?php echo $sub[0]?></option>
                                <option value=<?php echo $subid[1]?>><?php echo $sub[1]?></option>
                                <option value=<?php echo $subid[2]?>><?php echo $sub[2]?></option>
                                <option value=<?php echo $subid[3]?>><?php echo $sub[3]?></option></select></td>
                    <td><select name="fri3" class="form-control"><option disabled selected>Choose a subject</option>
                                <option value=<?php echo $subid[0]?>><?php echo $sub[0]?></option>
                                <option value=<?php echo $subid[1]?>><?php echo $sub[1]?></option>
                                <option value=<?php echo $subid[2]?>><?php echo $sub[2]?></option>
                                <option value=<?php echo $subid[3]?>><?php echo $sub[3]?></option></select></td></tr>

                    <tr><td><input type="submit" class="btn btn-md btn-primary" name="timetable" value="Set Time Table Now"></td></tr>    
                    </tbody>
                
            </table>
            </form>
            </div>
                
            </div>
           

            
        
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>
</html>

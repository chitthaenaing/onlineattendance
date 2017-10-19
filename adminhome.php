<?php session_start(); 

require 'functions.php';

$conn = connect();
if($conn){
    if($_SESSION['auth'] == 1){
    //To get total students
    $query = 'Select * from student';
    $result = get($query,$conn);
    $totalStudents = $result->rowCount();

    //To get total teachers 
    $query = 'Select * from user_accounts where type="teacher"';
    $result = get($query,$conn);
    $totalTeachers = $result->rowCount();

    //To get total Batch
    $query = 'Select * from batch';
    $result = get($query,$conn);
    $totalBatch = $result->rowCount();
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
      .panel{
        border-radius: 10px;
        margin-left: 20px;
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
           
            <p id="projectname">Welcome to Online Attendance System</p>

            <div class="row">
                <div class="panel col-sm-4 col-md-3" style="position:relative;background:#FF8A65;height:150px;">
        
                    <img src="images/student.png" class="col-sm-6 col-md-6" width="100px" height="100px">         
                       
                    <p class="col-sm-6 col-md-6" style="margin-top:20px"><span style="font-weight:bold;font-size:16pt;"><?= $totalStudents; ?></span></p>        

                    <div class="visible-col-md-block visible-col-sm-block"></div>
                    <p style="font-size:12pt;text-align:center" class="col-md-12 col-sm-12">Total Students</p>
                </div>

                <div class="panel col-sm-4 col-md-3" style="background:#4DB6AC;height:150px;">
                    <img src="images/teacher.png" class="col-sm-6 col-md-6" width="100px" height="100px">         
                       
                    <p class="col-sm-6 col-md-6" style="margin-top:20px"><span style="font-weight:bold;font-size:16pt;"><?= $totalTeachers;?></span></p>        

                    <div class="visible-col-md-block visible-col-sm-block"></div>
                    <p style="font-size:12pt;text-align:center" class="col-md-12 col-sm-12">Total Teachers</p>
                </div>

                <div class="panel col-sm-4 col-md-3" style="background:#9575CD;height:150px;">
                    <img src="images/batch.png" class="col-sm-6 col-md-6" width="100px" height="100px">         
                       
                    <p class="col-sm-6 col-md-6" style="margin-top:20px"><span style="font-weight:bold;font-size:16pt;"><?= $totalBatch; ?></span></p>        

                    <div class="visible-col-md-block visible-col-sm-block"></div>
                    <p style="font-size:12pt;text-align:center" class="col-md-12 col-sm-12">Total Batch</p>                    
                </div>
            </div>

            <!-- ./Panel  -->

            </div>
        
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    

 </body>
</html>

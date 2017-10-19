<?php session_start(); 

require 'functions.php';

$conn = connect();
if($conn){
    if($_SESSION['auth'] == 3){
    //To get total students
    $query = 'Select * from student';
    $result = get($query,$conn);
    
    if(isset($_GET['report'])){
        $id = $_GET['studentname'];

        $reportype = $_GET['reportype'];
    
        switch ($reportype) {

            case 'daily':
                header("location:dailyattendancereport.php?id=$id");
                break;
            case 'monthly':
                header("location:monthlyattendance.php?id=$id");
                break;
            case 'semester':
                header("location:semesterattendance.php?id=$id");
                break;
            }
        }


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
   

   
   
</head>
<body>
    <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            
  
            <div class="container">
           
            <p id="projectname">Attendance Report</p>
            <form action="#" method="get">
                <table class="table">
                    <tr>
                        <td>
                            <select name="studentname" class="form-control"> 
                                <option selected>Choose Student Name</option>
                                <?php while($row = $result->fetch()): ?>
                                <option value="<?=$row['student_id'];?>"><?= $row['student_name']; ?></option>
                            <?php endwhile; ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select name="reportype" class="form-control">
                                <option selected>Choose Report Type</option>
                                <option value="daily">Daily Attendance Report</option>
                                <option value="monthly">Monthly Attendance Report</option>
                                <option value="semester">Semester Attendance Report</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" name="report" value="report" class="btn btn-md btn-primary">
                        </td>
                    </tr>
                </table>

            </form>
            
            </div>
        
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
</body>
</html>

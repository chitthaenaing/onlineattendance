<?php  
    session_start();

    require 'functions.php';

    //Get Database Connection
    $conn = connect();
    $batchname="";
    $academicYear="";
    $semesterId;
    $startDate="";
    $endDate="";

    if($conn){
        //To Validate Session 
        if($_SESSION['auth'] == 1){

        if(isset($_GET['id'])){

        $id = $_GET['id'];
        
        $queryBatch = 'Select * from batch where batch_id=:id';
        $rsBatch = $conn->prepare($queryBatch);
        $rsBatch->execute(array(
            ':id'=>$id
            ));
        while($row = $rsBatch->fetch()){
            $batchname = $row['batch_name'];
            $semesterId= $row['semester_id'];
            $academicYear=$row['year'];
            $startDate = $row['start_date'];
            $endDate = $row['end_date'];
        }

        //To get Semester List from Semester
        $querySemester = 'Select * from semester';
        $semester = get($querySemester,$conn);    

        //To update Batch
        include 'updateBatch.php';
        }

    }else {
        //To redirect to the login page
        header("location:index.php");
    }    
}
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Fancy Sidebar Navigation - Bootsnipp.com</title>
    <meta name="viewport" content="width=device-width, initkial-scale=1">
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- <script src="js/bootstrap.min.js"></script> -->

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="/resources/demos/style.css">

     <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="bootstrap-3.3.7/js/bootstrap.min.js"></script>

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
</head>
<body>
    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <?php  include 'sidebar.php'; ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>

            <div class="container">

            <p id="projectname" >Batch Management</p>
            <div id="panel">
                <h1>Edit Batch</h1>

                <form action="#" method="post">
                
                <table>

                <tr>
                    <td>
                        <p>Batch Name</p>
                    </td>

                    <td>
                        <input type="text" name="batchname" class="form-control" value="<?= $batchname; ?> ">
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>Academic Year</p>

                    </td>
                    
                    <td>
                        <select name='academic_year' class="form-control" >
                            <option>Choose Academic Year</option> 
                            <option <?= ($academicYear == 'Foundation')?"selected":""; ?>>Foundation</option>
                            <option <?= ($academicYear == 'First Year')?"selected":""; ?>>First Year</option>
                            <option <?= ($academicYear == 'Second Year')?"selected":""; ?>>Second Year</option>
                        </select>
                    </td>
                </tr>

             <tr>
                <td>
                    <p>Semester</p>
                </td>

                <td>
                    <select name="semester" class="form-control">
                        <option selected>Choose Semester</option>
                            <?php while($row=$semester->fetch()):?>

                            <option value="<?= $row['semester_id'] ?>"<?=($semesterId == $row['semester_id'])?"selected":"" ?>><?= $row['semester_name'] ?></option>
                        
                            <?php  endwhile;?>
                    </select>
                </td>
             </tr>

              <tr>
                <td>
                   <p>Start Date</p>
                </td>

                <td>
                    <input type="text" name="start_date" class="form-control" id="startDatePicker" value="<?= $startDate; ?>">
                </td>
             </tr>

             <tr>

                <td>
                    <p>End Date</p>
                </td>

                <td>
                    <input type="text" name="end_date" class="form-control" id="endDatePicker" value="<?= $endDate; ?>">
                </td>
             </tr>

             <tr>
                <td>
                    
                </td>
                 <td>
                    <button name="updateBatch" class="btn btn-lg btn-primary">Update Batch</button>
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
<script type="text/javascript">
$(document).ready(function () {

  $('#batch').DataTable();

  $( "#startDatePicker" ).datepicker();

  $( "#endDatePicker" ).datepicker();
});

</script>
</body>
</html>

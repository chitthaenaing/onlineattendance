<?php  
    session_start();
    require 'functions.php';


    //Get Database Connection
    $conn = connect();

    if($conn){

        //To Validate Session 

        if($_SESSION['auth'] == 1){

        //To get Batch list
        $query = 'Select batch_id,batch_name from batch';
        $result = get($query,$conn);        

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            //To get student where student_id

            $stdQuery = 'Select * from student where student_id=:id';
            $rsStudent = $conn->prepare($stdQuery);
            $rsStudent->execute(array(
                ':id'=> $id
                ));
            while($row = $rsStudent->fetch()){
                $studentName=$row['student_name'];
                $batchId = $row['batch_id'];
            }

            //To update Student
            include 'updateStudent.php';

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
    
    <title>Online Student Attendance System</title>
        <meta name="viewport" content="width=device-width, initkial-scale=1">
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="shortcut icon" href="/imc.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- <script src="js/bootstrap.min.js"></script> -->

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="/resources/demos/style.css">

    <!-- Data Tables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

     <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
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

            <p id="projectname" >Student Management</p>
            <div id="panel">
                <h1>Student</h1>

                <form action="#" method="post" class="form-group">
                <table>
                    <tr>
                        <td>
                            <input type="text" name="studentName" placeholder="Enter Student Name" class="form-control" value="<?=$studentName;?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select name="batch" class="form-control">
                            <option selected>Choose Batch</option>
                            <?php while($row = $result->fetch()):?>
                             <option value="<?= $row['batch_id'] ?>"<?=($batchId == $row['batch_id'])?"selected":"" ?>><?= $row['batch_name'] ?></option>
                            <?php endwhile; ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" name="updateStudent" value="Update Student" class="btn btn-md btn-primary">
                        </td>
                    </tr>
                </table>
                    
                </form>
            </div> 
            <!-- /#panel  -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>
</html>


<?php  
    session_start();
    require 'functions.php';


    //Get Database Connection
    $conn = connect();

    if($conn){

        //To Validate Session 

        if($_SESSION['auth']){
            //To get Batch list
        $query = 'Select batch_id,batch_name from batch';
        $result = get($query,$conn);        

        //To get Student list
        $studentQuery = 'Select * from student left join batch on student.batch_id = batch.batch_id';
        $studentResult = get($studentQuery,$conn);

        if(isset($_POST['stdAdd'])){
            
            //To insert student 
            $studentName = $_POST['studentName'];
            $studentBatch = $_POST['batch'];
            echo $studentName;
            echo $studentBatch;
            $insertStdQuery = 'Insert into student(student_name,batch_id) values(:studentName,:studentBatch)';
            $binding= array(
                ':studentName' => $studentName,
                ':studentBatch' => $studentBatch
                );
            $rs = insert($insertStdQuery,$binding,$conn);
            if($rs) header("location:studentManagement.php");
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
                            <input type="text" name="studentName" placeholder="Enter Student Name" class="form-control">
                        </td>
                        <td>
                            <select name="batch" class="form-control">
                            <option selected>Choose Batch</option>
                            <?php while($row = $result->fetch()):?>
                            <?= "<option value=".$row['batch_id'].">".$row['batch_name']."</option>"; ?>
                            <?php endwhile; ?>
                            </select>
                        </td>

                        <td>
                            <input type="submit" name="stdAdd" value="Add" class="btn btn-md btn-primary">
                        </td>
                    </tr>
                </table>
               
                    
                    
                </form>


               
                <table id="student">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Batch Name</th>
                            <th>Manage</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($row = $studentResult->fetch()): ?>
        
                            <?= "<tr>
                                <td>".$row['student_name']."</td>
                                <td>".$row['batch_name']."</td>
                                <td><a href='editStudent.php?id=".$row['student_id']."' class='glyphicon glyphicon-pencil' id='edit'>Edit</a> / <a href='delStudent.php?id=".$row['student_id']."' class='glyphicon glyphicon-trash'>Delete</a></td>
                                </tr>";
                            ?>
                            <?php endwhile; ?>
                           
                    </tbody>
                </table>
                
            </div> 
            <!-- /#panel  -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    
<script type="text/javascript">
$(document).ready(function () {

 $('#student').DataTable();
 
});

</script>
</body>
</html>


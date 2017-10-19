<?php  
    session_start();

    require 'functions.php';

    //Get Database Connection
    $conn = connect();

    if($conn){
        //To Validate Session 
        if($_SESSION['auth']){
        //To get batch list
        $query = 'Select * from batch left join semester on batch.semester_id = semester.semester_id';
        $result = get($query,$conn);        

        //To get Academic Year from Batch 
        $queryBatch='Select * from batch';
        $year = get($queryBatch,$conn);

        //To get Semester List from Semester
        $querySemester = 'Select * from semester';
        $semester = get($querySemester,$conn);

        //To get Subjects
        $querySubject = "Select * from subject";
        $subjectresult = get($querySubject,$conn);
        $subrow=$subjectresult->fetchAll();
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
    <link rel="shortcut icon" href="/imc.ico">
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
                <h1>Batch</h1>

                <p>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create Batch</button>
                </p>

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Create Batch</h4>
                      </div>
                      <div class="modal-body">
                         <form action="createBatch.php" method="post" style="position:relative">
                <table>

                <tr>
                    <td>
                        <p>Batch Name</p>
                    </td>

                    <td>
                        <input type="text" name="batchname" class="form-control">
                    </td>
                </tr>

             <tr>
                <td>
                    <p>Year and Semester</p>
                </td>

                <td>
                    <select name="semester" class="form-control">
                        <option selected>Choose Semester</option>
                            <?php while($row=$semester->fetch()):?>
                            <?= "<option value=". $row['semester_id'].">".$row['semester_name']."</option>";  ?>
                            <?php  endwhile;?>
                    </select>
                </td>
             </tr>

              <tr>
                <td>
                   <p>Start Date</p>
                </td>

                <td>
                    <input type="text" name="start_date" class="form-control" id="startDatePicker">
                </td>
             </tr>

             <tr>

                <td>
                    <p>End Date</p>
                </td>

                <td>
                    <input type="text" name="end_date" class="form-control" id="endDatePicker">
                </td>
             </tr>

             <tr>

                <td>
                    <p>Subject 1</p>
                </td>

                <td>
                       <select name="subject1" class="form-control">
                        <option selected>Choose Subject 1</option>
                            <?php foreach($subrow as $row) {?>
                            <?= "<option value=". $row['subject_id'].">".$row['subject_name']."</option>";  ?>
                            <?php  }?>
                    </select>
                </td>
             </tr>
             <tr>

                <td>
                    <p>Subject 2</p>
                </td>

                 <td>
                       <select name="subject2" class="form-control">
                        <option selected>Choose Subject 2</option>
                            <?php foreach($subrow as $row) {?>
                            <?= "<option value=". $row['subject_id'].">".$row['subject_name']."</option>";  ?>
                            <?php  }?>
                    </select>
                </td>
             </tr>
             <tr>

                <td>
                    <p>Subject 3</p>
                </td>

                 <td>
                       <select name="subject3" class="form-control">
                        <option selected>Choose Subject 3</option>
                            <?php foreach($subrow as $row) {?>
                            <?= "<option value=". $row['subject_id'].">".$row['subject_name']."</option>";  ?>
                            <?php  }?>
                    </select>
                </td>
             </tr>
             <tr>

                <td>
                    <p>Subject 4</p>
                </td>

               <td>
                       <select name="subject4" class="form-control">
                        <option selected>Choose Subject 4</option>
                            <?php foreach($subrow as $row) {?>
                            <?= "<option value=". $row['subject_id'].">".$row['subject_name']."</option>";  ?>
                            <?php  }?>
                    </select>
                </td>
             </tr>
            

             <tr>
                <td>
                    
                </td>
                 <td>
                    <button name="createBatch" class="btn btn-lg btn-primary">Create Batch</button>
                </td>
             </tr>
            </table>
                </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>



                <table id="batch">
                    <thead>
                        <tr>
                            <th>Batch Name</th>
                            <th>Year and Semester</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Manage</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($row = $result->fetch()): ?>
        
                            <?= "<tr>
                                <td>".$row['batch_name']."</td>
                                <td>".$row['semester_name']."</td>                        
                                <td>".$row['start_date']."</td>
                                <td>".$row['end_date']."</td>
                                 <td><a href='editBatch.php?id=".$row['batch_id']."'  class='glyphicon glyphicon-pencil'>Edit</a> / <a href='delBatch.php?id=".$row['batch_id']."' class='glyphicon glyphicon-trash'>Delete</a></td>
                                 <td><a name='settime' href='timetable.php?id=$row[batch_id]'>Set Timetable</a></td>
                                </tr>";
                            ?>
                            <?php endwhile; ?>
                           
                    </tbody>
                </table>
            </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
<script type="text/javascript">
$(document).ready(function () {

  $('#batch').DataTable();

  $( "#startDatePicker" ).datepicker(
    {
        dateFormat : "yy-m-d"
    });

  $( "#endDatePicker" ).datepicker(
    {
        dateFormat : "yy-m-d"
    });
});

</script>
</body>
</html>

<?php  session_start();
    require 'functions.php';

    $conn = connect();

    //Get Database Connection
    if($conn){
        //To Validate Session 
    if($_SESSION['auth']){

        //To get Student list
        $subjectQuery = 'Select * from subject';
        $subjectResult = get($subjectQuery,$conn);

        if(isset($_POST['subAdd'])){
            
            //To insert student 
            $subjectName = $_POST['subjectName'];
            if($subjectName=="")
                echo "<script>alert('Please Enter Subject Name!')</script>";

            else
            {
            $insertSubQuery = 'Insert into subject(subject_name) values(:subjectName)';
            $binding= array(
                ':subjectName' => $subjectName
                );
            $rs = insert($insertSubQuery,$binding,$conn);
            if($rs) header("location:subjectmanagement.php");
        }
        }

    }else {
        //To redirect to the login page
        header("Location:index.php");
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body>
    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>

            <div class="container">

            <p id="projectname" >Subject Management</p>
            <div id="panel">
                <h1>Subject</h1>

                <form action="#" method="post" class="form-group">
                <table>
                    <tr>
                        <td>
                            <input type="text" name="subjectName" placeholder="Enter Subject Name" class="form-control">
                        </td>
                       
                        <td>
                            <input type="submit" name="subAdd" value="Add" class="btn btn-md btn-primary">
                        </td>
                    </tr>
                </table>
               
                    
                    
                </form>


               
                <table id="student">
                    <thead>
                        <tr>
                            <th>Subject Name</th>
                            <th>Manage</th>
                     
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($row = $subjectResult->fetch()): ?>
        
                            <?= "<tr>
                                <td>".$row['subject_name']."</td>
                                <td><a href='deletesubject.php?id=$row[subject_id]'>Delete</a> </td>
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

<?php session_start(); 

 require 'functions.php';

    $conn = connect();


    $date = date('Y-m-d');
    $timestamp = strtotime($date);
    $day = date('l', $timestamp);


    $time = $_GET['time'];
    $batchid = $_GET['batchid'];

    $query = "select * from timetable where batch_id='$batchid' and time='$time' and day='$day'";
    $subjectresult = get($query,$conn);
    while($row=$subjectresult->fetch()):
        $subid =  $row['subject_id'];
        endwhile;
    
  

    $query = "Select * from batch where batch_id='$batchid'";
    $batchresult = get($query,$conn);

    $batch = $batchresult->fetchAll();

    foreach ($batch as $row)
    {
        $batch = $row['batch_name'];
    }



    $query = "Select * from student where batch_id='$batchid'";
    $studentresult = get($query,$conn);

    $students = $studentresult->fetchAll();

    $i=0;

    foreach ($students as $row)
    {
        $stu[$i] = $row['student_name'];
        $stuid[$i] = $row['student_id'];
        $i++;
    }



    $query = "Select * from subject where subject_id='$subid'";
    $subresult = get($query,$conn);

    $sub = $subresult->fetchAll();

    foreach ($sub as $row)
    {
        $sub = $row['subject_name'];
    }
 
    if(isset($_POST['savedaily'])){
        include 'savedaily.php';
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
            width: 200px;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
                    <ul class="nav sidebar-nav">

                        <li class="sidebar-brand">
                            <a href="batch.php" id="title">
                               Teacher Panel
                            </a>
                        </li>
                        
                        <li>
                            <a href="logout.php">Log Out</a>
                        </li>

                      <p id="admininfo">Teacher Name: <span><?= $_SESSION['username']; ?></span></p>

                    </ul>
        </nav>

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
  
            <div class="container">
           
            <p id="projectname">Roll Call</p>

            <h2>Batch Name : <?php echo $batch;?></h2>
            <h2>Subject Name : <?php echo $sub;?></h2>
            <h2>Time : <?php if($time==1) echo "First Time"; else if($time==2) echo "Second Time"; else echo "Third Time" ?></h2>
            <h4>Date : <?php echo $date;?></h4>
            <h4>Day : <?php echo $day;?></h4>



            <form action="#" method="post">
            <table>
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th colspan="2">Status</th>
                        <th>Remark</th>    
                    </tr>
                </thead>
                
                <tbody>
                    <?php for($i=0;$i<sizeof($stu);$i++): ?>  
                    <tr>
                        <td><?php echo $stu[$i];?></td>
                        <td>
                               <label class="radio"><input type="radio" name="<?php echo $stuid[$i]."n";?>" value="present">
                               Present
                               </label>  
                        </td>

                        <td>
                                <label class="radio"><input type="radio"  name="<?php echo $stuid[$i]."n";?>" value="absent">    
                                Absent
                                </label>
                        </td>

                        <td>
                            <div class="form-group">

                                <textarea class="form-control" name="<?php echo $stuid[$i]."t";?>"></textarea>
                            </div>
                        </td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
                
                <tfoot>
                  <tr><td><input type="submit" class="btn btn-md btn-primary" name="savedaily" value="Confirm"></td></tr>
                </tfoot>
            </table>
            </form>


            </div>
        
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
<script type="text/javascript">
$(document).ready(function () {

  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();
    });

    function hamburger_cross() {

      if (isClosed == true) {
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }

  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });

 
});

</script>   
</body>
</html>

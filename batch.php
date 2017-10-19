<?php session_start(); 

require 'functions.php';

$conn = connect();
if($conn){
    if($_SESSION['auth'] == 2){
        
    $date = date('Y-m-d');
    $timestamp = strtotime($date);
    $day = date('l', $timestamp);


    $query = "Select * from batch";
    $result = get($query,$conn);
    }else header("Location:index.php");
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
        ul li
        {
            list-style-type: none;
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

            <form action="dailyattendancesheet.php" method="get" class="form-group">
                <table width="50%">
                    <tr>
                        <td>
                            <select name="batchid" class="form-control">
                            <option selected>Choose Batch</option>
                            <?php while($row = $result->fetch()):?>
                            <?= "<option value=".$row['batch_id'].">".$row['batch_name']."</option>"; ?>
                            <?php endwhile; ?>
                            </select>
                        </td>
                        <td>
                            <select name="time" class="form-control">
                            <option selected>Choose Time</option>
                            <option value="1">First Time</option>
                            <option value="2">Second Time</option>
                            <option value="3">Third Time</option>
                            </select>
                        </td>

                        <td>
                            <input type="submit" name="daily" value="Go" class="btn btn-md btn-primary">
                        </td>
                    </tr>
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

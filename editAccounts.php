<?php  
    session_start();
    require 'functions.php';

    //Get Database Connection
    $conn = connect();
    $username="";
    $type="";

    
    if($conn){

        //To Validate Session 
        if($_SESSION['auth']){

          if(isset($_GET['id'])){

            $id = $_GET['id'];

            //To get user accounts where edit id
            $query = 'Select * from user_accounts where account_id=:id';
            $binding = array(':id'=>$id);
            $stmt = $conn->prepare($query);
            $stmt->execute($binding);        
            while($row = $stmt->fetch()){
              $username=$row['username'];
              $type=$row['type'];
            }

            include 'updateAccounts.php';
            
          }

        }else{
        //To redirect to the login page
            header("location:index.php");
        }
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Fancy Sidebar Navigation - Bootsnipp.com</title>
    <meta name="viewport" content="width=device-width, initkial-scale=1">
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- <script src="js/bootstrap.min.js"></script> -->

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="bootstrap-3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <?php include'sidebar.php'; ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
           <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
             <span class="hamb-top"></span>
      			 <span class="hamb-middle"></span>
  				   <span class="hamb-bottom"></span>
           </button>

            <div class="container">

                <p id="projectname" >User Account Management</p>
                <div id="panel">
                    <h1>Edit User Account</h1>

                <form action="#" method="POST">
                <table>
                  <tr>
                      <td>
                        <p>User Name</p>
                      </td>
                      
                      <td>
                        <input type="text" name="username" class="form-control" value="<?= $username ?>">
                      </td>
                  </tr>

                  <tr>
                      <td>
                        <p>Password</p>
                      </td>

                      <td>
                        <input type="password" name="password" class="form-control" value="default" disabled>
                      </td>

                  </tr>

                  <tr>
                      <td></td>    
                      <td><a href="#" class="btn btn-md btn-primary" id="btnNewPassword">New Password</a></td>
                  </tr>

                  <tr id="newPassword">
                  
                      <td>
                          <input type="password" name="newPassword" class="form-control" placeholder="Enter New Password">
                      </td>

                      <td >
                          <input type="password" name="confirmPassword" class="form-control" placeholder="Enter Confirm Password">
                      </td>

                  </tr>

                  <tr>
                    <td>
                      <p>Account Type</p>
                    </td>

                    <td>
                      <p id="radioform">
                        <span>
                           <input type="radio" name="radio" value="admin" id="admin" <?= ($type == 'admin')?"checked":""; ?>> Administrator
                        </span>

                        <span > 
                          <input type="radio" name="radio" value="teacher" id="teacher" <?= ($type == 'teacher')?"checked":""; ?>> Teacher
                        </span>
  
                      </p>
                    </td>
                  </tr>

                  <tr>
                      <td>
                   
                      </td>

                      <td>
                        <button name="update" class="btn btn-lg btn-primary">Update Account</button>
            
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

  $('#newPassword').hide();
  $('#btnNewPassword').on('click',function(){
    $('#newPassword').slideToggle("fast");
  });   
   
});

</script>
</body>
</html>

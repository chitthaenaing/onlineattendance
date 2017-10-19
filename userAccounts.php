<?php  
    session_start();
    require 'functions.php';

    //Get Database Connection
    $conn = connect();
    
    if($conn){

        //To Validate Session 
        if($_SESSION['auth']){

        //To get user accounts
        $query = 'Select * from user_accounts';
        $result = get($query,$conn);         

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
    <link rel="shortcut icon" href="/imc.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- <script src="js/bootstrap.min.js"></script> -->

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="bootstrap-3.3.7/js/bootstrap.min.js"></script>


    <!-- Data Tables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>



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

            <p id="projectname" >Account Management</p>
            <div id="panel">
                <h1>User Accounts</h1>

                <p>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create Account</button>
                </p>

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Create Account</h4>
                      </div>
                      <div class="modal-body">
                         <form action="createAccount.php" method="post" style="position:relative">
                <table>
                <tr>
                <td>
                <p>User Name</p>
                </td>
                <td>
            <input type="text" name="username" class="form-control">
            </td>
             </tr>

             <tr>
                <td>
                <p>Password</p>
                </td>
                <td>
            <input type="password" name="password" class="form-control">
            </td>
             </tr>

             <tr>
                <td>
                <p>Confirm Password</p>
                </td>
                <td>
            <input type="password" name="confirmpassword" class="form-control">
            </td>
             </tr>
              <tr>
                <td>
                <p>Account Type</p>
                </td>
                <td>
                <p id="radioform">
                <span>   <input type="radio" name="radio" value="admin" id="admin"> Administrator

              </span>
               <span > <input type="radio" name="radio" value="teacher" id="teacher"> Teacher

              </span>
              </p>
            </td>
             </tr>

             <tr>
                <td>
                   
                </td>
                <td>
            <button name="create" class="btn btn-lg btn-primary">Create Account</button>
            
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



                <table id="user_accounts">
                    <thead>
                        <tr>
                            <th>UserName</th>
                            <th>Password</th>
                            <th>Account Type</th>
                            <th>Created Date</th>
                            <th>Manage</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($row = $result->fetch()): ?>
                            <?= "<tr>
                                <td>".$row['username']."</td>
                                <td>".$row['password']."</td>
                                <td>".$row['type']."</td>
                                <td>".$row['created_date']."</td>
                                <td><a href='editAccounts.php?id=".$row['account_id']."'  class='glyphicon glyphicon-pencil'>Edit</a> / <a href='delAccounts.php?id=".$row['account_id']."' class='glyphicon glyphicon-trash'>Delete</a></td>
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

   $('#user_accounts').DataTable();

});

</script>
</body>
</html>

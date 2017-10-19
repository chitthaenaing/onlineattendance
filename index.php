<?php 
	session_start();
	require 'functions.php';

	//To get DB connection
	$conn = connect();

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		//To validate username and password 
		$query = "Select * from user_accounts where username=:username and password =:password";
		$binding = array(
			':username' => $username,
			':password' => $password
		);
		$stmt = $conn->prepare($query);
		$stmt ->execute($binding);
		$res = $stmt->rowCount();
		while($row = $stmt->fetch()) $type = $row['type'];

		if($res){
			//To set Session 
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['type'] = $type;
			

			//Check User Type
			if($type == 'admin'){
				$_SESSION['auth'] = 1;
				header("Location:adminhome.php");
			}
			else if($type == 'teacher'){

			$_SESSION['auth'] = 2;
			//Don't allow on Sat and Sun
			$date = date('Y-m-d');
    		$timestamp = strtotime($date);
    		$day = date('l', $timestamp);

		    if($day=="Saturday"||$day=="Sunday")
		    {
		        $text= "College Close Today ! (".$day.")";
		        echo "<script>alert('$text');</script>";

		    }else header("Location:batch.php");
		}
		
		}else{
			$_SESSION['auth'] = 0;
		}
			
	}else if(isset($_POST['guest'])){
		$_SESSION['auth'] = 3;
		header("location:studentattendancereport.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
<title>Online Attendance System</title>
<!-- For-Mobile-Apps -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> 
	addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
</script>
<!-- //For-Mobile-Apps -->
<!-- Style --> 
<link rel="shortcut icon" href="/imc.ico">
<link rel="stylesheet" href="css/loginstyle.css" type="text/css" media="all" />
</head>
<body>
<div class="container">
<h1>IMC Attendance System</h1>
	<div class="signin">
     	<form action="" method="post">
	      	<input type="text" name="username" class="user" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" />

	      	<input type="password" name="password" class="pass" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" />
	
          	<input type="submit" value="LOGIN" name="login" />
          	<input type="submit" value="GUEST" name="guest" />
	 	</form>
	</div>
</div>
<div class="footer">
	
</div>
</body>
</html>
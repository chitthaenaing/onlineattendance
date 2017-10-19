<?php
// require 'database.php';
require 'functions.php';

if(isset($_POST['create'])){
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $accountType = $_POST['radio'];
  
  
  try{

  //To get DB Connection
    $conn =connect();
  
  //To put the data into the user_accounts table 
    $query = "Insert into user_accounts(username,password,type,created_date) values(:username,:password,:accountType,NOW())";
      $binding=array( 
        'username' => $username,
        'password' => $password,
        'accountType' => $accountType,
  
        );

      $result = insert($query,$binding,$conn);
      if($result) header("Location:userAccounts.php");
  // $db=new Database();
  // $result = $db->insert($query,$binding);


  }catch(PDOException $e){
    echo $e-getMessage();
  }
}
?>

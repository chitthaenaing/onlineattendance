<?php

if(isset($_POST['update'])){

            $username = $_POST['username'];
            $pass = ($_POST['newPassword'] != "")? md5($_POST['newPassword']):"" ;
            $type = $_POST['radio'];
            if($pass == ""){
            $updateQuery = 'update user_accounts set username=:username, type=:type, modified_date=NOW() where account_id=:id';
            $updateBinding = array(
              ':username' => $username,
              ':type' => $type,
              ':id' => $id
                );
            }else{

            $updateQuery = 'update user_accounts set username=:username, password=:pass, type=:type, modified_date=NOW() where account_id=:id';
            $updateBinding = array(
              ':username' => $username,
              ':pass' => $pass,
              ':type' => $type,
              ':id' => $id
                );
            }
            $updateResult = $conn->prepare($updateQuery);
            $updateResult->execute($updateBinding);
  }

?>
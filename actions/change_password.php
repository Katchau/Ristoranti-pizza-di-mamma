<?php
    session_start();

    include_once('../database/actions/connection.php');
    include_once('../database/actions/user.php');

    $actual_password=$_POST['password'];
    $correctPass=getPassword($_SESSION['email']);

    if(password_verify($actual_password, $correctPass)){
      $newPassword = $_POST['new_password'];
      $confNewPassword = $_POST['new_password_confirm'];

      if($newPassword == $confNewPassword){
        $newPass = password_hash($newPassword, PASSWORD_DEFAULT);
        changeUserPassword($_SESSION['email'],$newPass);
        header('Location: ../pages/user_profile_page.php');
      }
      else{
        echo 'New Passwords don´t match';
      }
    }
    else{
      echo 'Actual password is incorrect.';
    }

 ?>

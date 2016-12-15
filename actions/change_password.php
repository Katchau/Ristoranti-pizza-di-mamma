<?php
    session_start();

    include_once('../database/user.php');

    $actual_password=htmlspecialchars($_POST['password']);
    $correctPass=getPassword($_SESSION['email']);


    if(password_verify($actual_password, $correctPass)){
      $newPassword = htmlspecialchars($_POST['new_password']);
      $confNewPassword = htmlspecialchars($_POST['new_password_confirm']);

      if(strlen($newPassword)<8){
          echo json_encode(1);
      }

      else if($newPassword == $confNewPassword){
        $newPass = password_hash($newPassword, PASSWORD_DEFAULT);
        if (changeUserPassword($_SESSION['email'],$newPass) == 1){
          echo json_encode(0);
        }
        else{
          echo json_encode(2);
        }
      }
      else{
        echo json_encode(3);
      }
    }
    else{
      echo json_encode(4);
    }

 ?>

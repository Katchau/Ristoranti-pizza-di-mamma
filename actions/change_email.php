<?php
    session_start();

    include_once('../database/actions/connection.php');
    include_once('../database/actions/user.php');

    $newEmail=htmlspecialchars($_POST['novo_email']);

    if (changeUserEmail($_SESSION['email'],$newEmail) == 1){
      $_SESSION['email'] = $newEmail;
      header('Location: ../pages/user_profile_page.php');
    }
    else{
      echo 'Something went wrong trying to change your email';
    }

 ?>

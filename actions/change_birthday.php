<?php
    session_start();

    include_once('../database/actions/connection.php');
    include_once('../database/actions/user.php');

    $birthday=htmlspecialchars($_POST['birthday']);

    if(changeUserBirthday($_SESSION['email'],$birthday) == 1){
      header('Location: ../pages/user_profile_page.php');
    }
    else{
      echo 'Something went wrong trying to change your birthday date';
    }


 ?>

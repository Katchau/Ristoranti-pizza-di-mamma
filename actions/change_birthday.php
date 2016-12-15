<?php
    session_start();

    include_once('../database/user.php');

    $birthday=htmlspecialchars($_POST['birthday']);

    if(changeUserBirthday($_SESSION['email'],$birthday) == 1){
      header('Location: ../pages/user_profile_page.php?id=' . $_SESSION['id'] . '');
    }
    else{
      echo 'Something went wrong trying to change your birthday date';
    }


 ?>

<?php
    session_start();

    include_once('../database/actions/connection.php');
    include_once('../database/actions/user.php');

    $first_name=htmlspecialchars($_POST['first_name']);
    $last_name=htmlspecialchars($_POST['last_name']);

    $nomeCompleto = $first_name;
    $nomeCompleto .= " ";
    $nomeCompleto .= $last_name;

    if (changeUserName($_SESSION['email'],$first_name,$last_name) == 1){
      $_SESSION['name'] = $nomeCompleto;
      header('Location: ../pages/user_profile_page.php');
    }
    else{
      echo 'Something went wrong trying to change your name';
    }


 ?>

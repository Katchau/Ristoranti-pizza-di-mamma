<?php
    session_start();

    include_once('../database/user.php');

    $first_name=htmlspecialchars($_POST['first_name']);
    $last_name=htmlspecialchars($_POST['last_name']);

    $nomeCompleto = $first_name;
    $nomeCompleto .= " ";
    $nomeCompleto .= $last_name;

    if (changeUserName($_SESSION['email'],$first_name,$last_name) == 1){
      $_SESSION['name'] = $nomeCompleto;
      header('Location: ../pages/user_profile_page.php?id=' . $_SESSION['id'] . '');
    }
    else{
      echo 'Something went wrong trying to change your name';
    }


 ?>

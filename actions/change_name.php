<?php
    session_start();

    include_once('../database/actions/connection.php');
    include_once('../database/actions/user.php');

    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];

    $nomeCompleto = $first_name;
    $nomeCompleto .= " ";
    $nomeCompleto .= $last_name;

    changeUserName($_SESSION['email'],$first_name,$last_name);

    $_SESSION['name'] = $nomeCompleto;

    header('Location: ../pages/user_profile_page.php');

 ?>

<?php
    session_start();

    include_once('../database/actions/connection.php');
    include_once('../database/actions/user.php');

    $newEmail=$_POST['novo_email'];

    changeUserEmail($_SESSION['email'],$newEmail);

    $_SESSION['email'] = $newEmail;

    header('Location: ../pages/user_profile_page.php');
 ?>

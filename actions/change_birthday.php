<?php
    session_start();

    include_once('../database/actions/connection.php');
    include_once('../database/actions/user.php');

    $birthday=$_POST['birthday'];

    changeUserBirthday($_SESSION['email'],$birthday);

    header('Location: ../pages/user_profile_page.php');
 ?>

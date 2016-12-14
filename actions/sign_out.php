<?php
session_start();

if(isset($_SESSION['name'])){
    session_unset();
    session_destroy();
}

header('Location: ../pages/principal_page.php');

 ?>

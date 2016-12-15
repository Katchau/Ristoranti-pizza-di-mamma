<?php
    session_start();

    include_once('../database/user.php');

    $newEmail=htmlspecialchars($_POST['novo_email']);

    if (changeUserEmail($_SESSION['email'],$newEmail) == 1){
      $_SESSION['email'] = $newEmail;
        echo json_encode(0);
    }
    else{
      echo json_encode(1);
    }

 ?>

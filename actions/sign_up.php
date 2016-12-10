<?php

include_once('../database/actions/user.php');

$firstName=trim($_POST['firstName']);
$lastName=trim($_POST['lastName']);
$birthday=$_POST['birthday'];
$password=$_POST['password'];
$passwordConfirmed=$_POST['passwordConfirm'];
$email=trim($_POST['email']);

if($firstName && $lastName && $password && $passwordConfirmed && $email){

    if(strlen($password)<8){
        echo 'Password is too short. Please choose a new one.';
        return;
    }

    if($password!==$passwordConfirmed || strlen($password)!=strlen($passwordConfirmed)){
        echo 'Password confirmation does not match.';
        return;
    }

    $pass = password_hash($password, PASSWORD_DEFAULT);

    if(newUser($firstName,$lastName,$birthday,$pass,$email)==0){

      session_start();

      $userInfo = getUserInfo($email);

      $nomeCompleto = $userInfo['firstName'];
      $nomeCompleto .= " ";
      $nomeCompleto .= $userInfo['lastName'];

      $_SESSION['email'] = $email;
      $_SESSION['name'] = $nomeCompleto;
      $_SESSION['id'] = $userInfo['id'];

      header('Location: ../pages/principal_page.php');
    }
    else {
        echo 'Invalid account. Email already exists.';
        return;
    }
}

?>

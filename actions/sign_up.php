<?php

include_once('../database/actions/user.php');

if($_SESSION['token-login']!=$_POST['token-login'])
{
    echo "ERROR PAGE.";
}

$firstName=htmlspecialchars(trim($_POST['firstName']));
$lastName=htmlspecialchars(trim($_POST['lastName']));
$birthday=htmlspecialchars($_POST['birthday']);
$password=htmlspecialchars($_POST['password']);
$passwordConfirmed=htmlspecialchars($_POST['passwordConfirm']);
$email=htmlspecialchars(trim($_POST['email']));

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
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }
}

?>

<?php

include_once('../database/user.php');

if($_SESSION['token-login']!=$_POST['token-login'])
{
    echo json_encode(1);
}

$firstName=htmlspecialchars(trim($_POST['firstName']));
$lastName=htmlspecialchars(trim($_POST['lastName']));
$birthday=htmlspecialchars($_POST['birthday']);
$password=htmlspecialchars($_POST['password']);
$passwordConfirmed=htmlspecialchars($_POST['passwordConfirm']);
$email=htmlspecialchars(trim($_POST['email']));

if($firstName && $lastName && $password && $passwordConfirmed && $email){

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

        echo json_encode(1);

    }
    else {
        echo json_encode(0);
    }
}

?>

<?php
  include_once('../database/actions/connection.php');
  include_once('../database/actions/user.php');

if($_SESSION['token-login']!=$_POST['token-login'])
{
    echo "ERROR PAGE.";
}

  $email=htmlspecialchars(trim($_POST['Email']));
  $password=htmlspecialchars($_POST['Password']);
  $correctPass = getPassword($email);

  if(strlen($email) != 0 && password_verify($password, $correctPass)){

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
  else{
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      die();
  }


?>

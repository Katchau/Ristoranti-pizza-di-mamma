<?php
  include_once('../actions/connection.php');
  include_once('../actions/user.php');



  $email=$_POST['email'];
  $password=$_POST['password'];
  $correctPass = getPassword($email, $password);

  if ($correctPass == $password){

    session_start();

    $userInfo = getUserInfo($email);

    $nomeCompleto = $userInfo['firstName'];
    $nomeCompleto .= " ";
    $nomeCompleto .= $userInfo['lastName'];

    $_SESSION['email'] = $email;
    $_SESSION['name'] = $nomeCompleto;
    $_SESSION['id'] = $userInfo['id'];

    header('Location: ../actions/logged_page.php');
  }
  else{
    include_once('../actions/login.php');
    echo "User or Password incorrect";
  }

?>

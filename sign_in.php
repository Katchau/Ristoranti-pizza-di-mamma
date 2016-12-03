<?php
  include_once('actions/connection.php');
  include_once('actions/user.php');

  $email=$_POST['email'];
  $password=$_POST['password'];
  $correctPass = getPassword($email, $password);

  if ($correctPass == $password){

    $userInfo = getUserInfo($email);

    $nomeCompleto = $userInfo['firstName'];
    $nomeCompleto .= " ";
    $nomeCompleto .= $userInfo['lastName'];

    $_SESSION['email'] = $email;
    $_SESSION['name'] = $nomeCompleto;
    $_SESSION['id'] = $userInfo['id'];

    include_once('logged_page.php');
  }
  else{
    include_once('login.php');
    echo "User or Password incorrect";
  }

?>

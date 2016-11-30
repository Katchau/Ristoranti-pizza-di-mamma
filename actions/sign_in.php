<?php
  include_once('connection.php');
  include_once('user.php');

  $email=$_POST['email'];
  $password=$_POST['password'];
  $correctPass = getPassword($email, $password);

  if ($correctPass == $password){
    include_once('logged_page.php.');
  }
  else{
    include_once('login.php');
    echo "User or Password incorrect";
  }

?>

<?php
  include_once('actions/connection.php');
  include_once('actions/user.php');

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

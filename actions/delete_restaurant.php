<?php
	
	session_start();
	
  include_once('../database/connection.php');
  include_once('../database/restaurant.php');

  $id = htmlspecialchars($_GET['id']);

  echo $id;

  if(deleteRestaurant($id) == 1){
    header('Location: ../pages/user_profile_page.php?id=' . $_SESSION['id'] .'');
  }
  else{
    header('Location: ../pages/restaurant_page.php?id=' . $_GET['id'] . '');
    echo 'Error deleting restaurant';
  }

?>

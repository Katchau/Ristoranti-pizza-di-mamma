<?php

include_once('../database/connection.php');
include_once('../database/restaurant.php');

  $id = $_GET['id'];
  $type = $_POST['restaurant-type'];
  
  if (changeRestaurantType($type, $id) == 1){
    header('Location: ../pages/restaurant_page.php?id=' . $_GET['id'] . '');
  }
  else{
    echo'Error changing the type of the restaurant';
  }
?>

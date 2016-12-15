<?php

include_once('../database/connection.php');
include_once('../database/restaurant.php');

  $id = $_GET['id'];
  $number = htmlspecialchars(trim($_POST['restaurantNumber']));

  if (changeRestaurantNumber($number, $id) == 1){
    header('Location: ../pages/restaurant_page.php?id=' . $_GET['id'] . '');
  }
  else{
    echo'Error changing the contact of the restaurant';
  }
?>

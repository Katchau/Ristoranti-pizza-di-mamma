<?php

include_once('../../database/actions/connection.php');
include_once('../../database/actions/restaurant.php');

  $id = $_GET['id'];
  $number = $_POST['restaurantNumber'];

  if (changeRestaurantNumber($number, $id) == 1){
    header('Location: ../restaurant_page.php?id=' . $_GET['id'] . '');
  }
  else{
    echo'Error changing the contact of the restaurant';
  }
?>

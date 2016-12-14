<?php

include_once('../../database/actions/connection.php');
include_once('../../database/actions/restaurant.php');
  $id = $_GET['id'];
  $adress = $_POST['restaurantAdress'];
  $city = $_POST['restaurantCity'];

  if (changeRestaurantAdress($adress, $city, $id) == 1){
    header('Location: ../restaurant_page.php?id=' . $_GET['id'] . '');
  }
  else{
    echo'Error changing the addslashesress of the restaurant';
  }
?>

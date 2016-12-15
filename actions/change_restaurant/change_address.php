<?php

include_once('../../database/actions/connection.php');
include_once('../../database/actions/restaurant.php');
  $id = $_GET['id'];
  $adress = htmlspecialchars(trim($_POST['restaurantAdress']));
  $city = htmlspecialchars(trim($_POST['restaurantCity']));

  if (changeRestaurantAdress($adress, $city, $id) == 1){
    header('Location: ../../pages/restaurant_page.php?id=' . $_GET['id'] . '');
  }
  else{
    echo'Error changing the addslashesress of the restaurant';
  }
?>

<?php

include_once('../../database/actions/connection.php');
include_once('../../database/actions/restaurant.php');

  $id = $_GET['id'];
  $type = $_POST['restaurantType'];

  if (changeRestaurantType($type, $id) == 1){
    header('Location: ../../pages/restaurant_page.php?id=' . $_GET['id'] . '');
  }
  else{
    echo'Error changing the type of the restaurant';
  }
?>

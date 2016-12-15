<?php

include_once('../../database/actions/connection.php');
include_once('../../database/actions/restaurant.php');

  $id = $_GET['id'];
  $name = htmlspecialchars(trim($_POST['restaurantName']));

  if (changeRestaurantName($name, $id) == 1){
    header('Location: ../../pages/restaurant_page.php?id=' . $_GET['id'] . '');
  }
  else{
    echo'Error changing the name of the restaurant';
  }

?>

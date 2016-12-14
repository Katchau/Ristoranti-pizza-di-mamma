<?php

include_once('../../database/actions/connection.php');
include_once('../../database/actions/restaurant.php');

  $id = $_GET['id'];
  $name = $_POST['restaurantName'];

  if(strlen($name)<4)
  {
      echo 'Restaurant name should be bigger.';
  }

  else if (changeRestaurantName($name, $id) == 1){
    header('Location: ../restaurant_page.php?id=' . $_GET['id'] . '');
  }
  else{
    echo'Error changing the name of the restaurant';
  }

?>

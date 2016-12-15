<?php

include_once('../database/connection.php');
include_once('../database/restaurant.php');

  $id = $_GET['id'];
  $description = htmlspecialchars($_POST['restaurantDescritpion']);

  if (changeRestaurantDescription($description, $id) == 1){
    header('Location: ../pages/restaurant_page.php?id=' . $_GET['id'] . '');
  }
  else{
    echo'Error changing the description of the restaurant';
  }
?>

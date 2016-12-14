<?php
include_once('../../database/actions/connection.php');
include_once('../../database/actions/restaurant.php');

  $id = $_GET['id'];
  $schedule = $_POST['restaurantOpen'];
  $schedule .= '-';
  $schedule .= $_POST['restaurantClose'];

  if (changeRestaurantSchedule($schedule, $id) == 1){
    header('Location: ../restaurant_page.php?id=' . $_GET['id'] . '');
  }
  else{
    echo'Error changing the schedule of the restaurant';
  }
?>

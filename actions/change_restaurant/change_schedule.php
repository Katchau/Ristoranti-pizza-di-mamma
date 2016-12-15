<?php
include_once('../../database/actions/connection.php');
include_once('../../database/actions/restaurant.php');

  $id = $_GET['id'];
  $schedule = htmlspecialchars(trim($_POST['restaurantOpen']));
  $schedule .= '-';
  $schedule .= htmlspecialchars(($_POST['restaurantClose']));

  if (changeRestaurantSchedule($schedule, $id) == 1){
    header('Location: ../../pages/restaurant_page.php?id=' . $_GET['id'] . '');
  }
  else{
    echo'Error changing the schedule of the restaurant';
  }
?>

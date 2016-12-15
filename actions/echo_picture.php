
<?php

include_once('../database/restaurant.php');
$return = getRestaurantPicture($_GET['id']);
echo json_encode($return['name']);

?>
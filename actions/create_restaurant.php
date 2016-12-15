<?php

session_start();

include_once('../database/restaurant.php');

$restaurantName=htmlspecialchars(trim($_POST['restaurant-name']));
$description=htmlspecialchars($_POST['restaurant-description']);
$address=htmlspecialchars(trim($_POST['restaurant-address']));
$city=htmlspecialchars(trim($_POST['restaurant-city']));
$contacts=htmlspecialchars(trim($_POST['restaurant-contacts']));
$schedule=htmlspecialchars(trim($_POST['restaurant-schedule']));
$owner_id=$_SESSION['id'];
$type=$_POST['restaurant-type'];


if($restaurantName && $address && $contacts && $schedule && $owner_id && $type)
{

    if(insertRestaurant($restaurantName,$description,$city,$address,$contacts,$schedule,$owner_id,$type)==0)
    {
        header('Location: ../pages/user_profile_page.php?id=' . $_SESSION['id'] . '');
    }
    else {
        echo 'falhou insert';
    }
}

?>

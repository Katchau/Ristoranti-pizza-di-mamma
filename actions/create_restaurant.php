<?php

session_start();

include_once('../database/actions/restaurant.php');

$restaurantName=htmlspecialchars($_POST['restaurant-name']);
$description=htmlspecialchars($_POST['restaurant-description']);
$address=htmlspecialchars($_POST['restaurant-address']);
$city=htmlspecialchars($_POST['restaurant-city']);
$contacts=htmlspecialchars($_POST['restaurant-contacts']);
$schedule=htmlspecialchars($_POST['restaurant-schedule']);
$owner_id=$_SESSION['id'];
$type=htmlspecialchars($_POST['restaurant-type']);


if($restaurantName && $address && $contacts && $schedule && $owner_id && $type)
{

    if(strlen($restaurantName)<4)
    {
        echo 'Restaurant name should be bigger.';
    }

    if(strlen($contacts)!==9)
    {
        echo 'Not a possible contact.';
    }

    if(insertRestaurant($restaurantName,$description,$city,$address,$contacts,$schedule,$owner_id,$type)==0)
    {
        header('Location: ../pages/user_profile_page.php');
    }
    else {
        echo 'falhou insert';
    }
}

?>

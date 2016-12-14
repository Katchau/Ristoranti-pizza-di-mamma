<?php

session_start();

include_once('../database/actions/restaurant.php');

$restaurantName=$_POST['restaurant-name'];
$description=$_POST['restaurant-description'];
$address=$_POST['restaurant-address'];
$city=$_POST['restaurant-city'];
$contacts=$_POST['restaurant-contacts'];
$schedule=$_POST['restaurant-schedule'];
$owner_id=$_SESSION['id'];
$type=$_POST['restaurant-type'];


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

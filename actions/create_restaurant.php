<?php

session_start();

include_once('../database/actions/restaurant.php');

$restaurantName;
$address;
$contacts;
$schedule;
$owner_id;

if($restaurantName && $address && $contacts && $schedule && $owner_id)
{

    if(strlen($restaurantName)<4)
    {
        echo 'Restaurant name should be bigger.';
    }

    if(strlen($contacts)!==9)
    {
        echo 'Not a possible contact.';
    }

    if(insertRestaurant($restaurantName,$address,$contacts,$schedule,$owner_id)==0)
    {
        header('Location: ../pages/user_profile_page.php');
    }
}

?>
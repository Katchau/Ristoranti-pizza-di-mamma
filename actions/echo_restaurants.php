<?php

	include("../database/actions/restaurant.php");
	include("similarRestaurants.php");
	
	$curName = $_GET['nameR'];
	$curPlace = $_GET['place'];
	if($curName == null) $curName = "";
	$curName = strtolower($curName);
	$rests = getRestaurants();
	$return = "No restaurant found :(";
	
	$return = getSimilarRestaurants($curName,$curPlace,$rests,$return, true);
	echo json_encode($return);

?>
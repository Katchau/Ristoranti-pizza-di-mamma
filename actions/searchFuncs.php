<?php

	include("../database/actions/restaurant.php");
	include("similarRestaurants.php");
	
	$curName = $_GET['nameR'];
	if($curName == null) $curName = "";
	$curPlace = $_GET['place'];
	$curName = strtolower($curName);
	$rests = getRestaurants();
	$return = "No restaurant found :(";
	
	$return = getSimilarRestaurants($curName,$curPlace,$rests,$return,false);
	echo json_encode($return);

?>
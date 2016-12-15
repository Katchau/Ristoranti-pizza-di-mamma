<?php

	include("../database/restaurant.php");
	include("similarRestaurants.php");
	
	$curName = htmlspecialchars($_GET['nameR']);
	$curPlace = htmlspecialchars($_GET['place']);
	if($curName == null) $curName = "";
	$curName = strtolower($curName);
	$rests = getRestaurants();
	$return = "No restaurant found :(";
	
	$return = getSimilarRestaurants($curName,$curPlace,$rests,$return, true);
	echo json_encode($return);

?>
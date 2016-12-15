<?php

	include("../database/restaurant.php");
	include("similarRestaurants.php");
	
	$curName = htmlspecialchars($_GET['nameR']);
	if($curName == null) $curName = "";
	$curPlace = htmlspecialchars($_GET['place']);
	$curName = strtolower($curName);
	$rests = getRestaurants();
	$return = "No restaurant found :(";
	
	$return = getSimilarRestaurants($curName,$curPlace,$rests,$return,false);
	echo json_encode($return);

?>
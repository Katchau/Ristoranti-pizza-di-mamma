<?php

	include("../database/actions/restaurant.php");
	include("similarRestaurants.php");
	
	$curName = htmlspecialchars($_GET['nameR']);
	$curPlace = htmlspecialchars($_GET['place']);
	if($curName == null) $curName = "";
	$curName = strtolower($curName);
	$rests = getRestaurants();
	$return = "Não foram encontrados restaurantes.";
	
	$return = getSimilarRestaurants($curName,$curPlace,$rests,$return, true);
	echo json_encode($return);

?>
<?php

	include("../database/actions/restaurant.php");
	include("similarRestaurants.php");
	
	$curName = htmlspecialchars($_GET['nameR']);
	if($curName == null) $curName = "";
	$curPlace = htmlspecialchars($_GET['place']);
	$curName = strtolower($curName);
	$rests = getRestaurants();
	$return = "Não foram encontrado restaurantes.";
	
	$return = getSimilarRestaurants($curName,$curPlace,$rests,$return,false);
	echo json_encode($return);

?>
<?php

	include("connection.php");
	include("restaurant.php");
	include("stringAlgorithms.php");
	
	$curName = $_GET['nameR'];
	$curPlace = $_GET['place'];
	$curName = strtolower($curName);
	$rests = getRestaurants();
	$return = "No restaurant found :(";
	
	function getSimilarRestaurants($curName,$curPlace,$rests,$return){
		if($curName == "")  $return = "Type the restaurant name!";
		$length = strlen($curName);
		foreach($rests as $row){
			if($row['adress'] == $curPlace || $curPlace == "" || $curPlace == " "){
				$aproved = false;
				$name = strtolower($row['name']);
				if(kmp_function($curName,$name)){
					$aproved = true;
				}
				else{
					$distance = distance($row['name'],$curName);
					if($distance < 3) $aproved = true;
				}
				if($aproved){
					if ($return == "No restaurant found :(") {
						$return = array();
						array_push($return, $row['name']);
						array_push($return, $row['id']);
					} 
					else {
						array_push($return, $row['name']);
						array_push($return, $row['id']);
					}
				}
			}
		}
		return $return;
	}
	
	$return = getSimilarRestaurants($curName,$curPlace,$rests,$return);
	echo json_encode($return);

?>
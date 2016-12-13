<?php

	include("stringAlgorithms.php");
	
	function pushArray($return, $name, $id, $has_v, $value, $address, $schedule){
		if($has_v){
			array_push($return, $name);
			array_push($return, $id);
			array_push($return, $value);
			array_push($return, $address);
			array_push($return, $schedule);
		}
		else{
			array_push($return, $name);
			array_push($return, $id);
		}
		return $return;
	}
	
	function getSimilarRestaurants($curName,$curPlace,$rests,$return, $value){
		if($curName == " ")  $return = "Type the restaurant name!";
		$length = strlen($curName);
		foreach($rests as $row){
			if($row['city'] == $curPlace || strtolower($row['city']) == $curPlace || $curPlace == "" || $curPlace == " "){
				$aproved = false;
				$name = strtolower($row['name']);
				if(kmp_function($curName,$name)){
					$aproved = true;
				}
				else{
					$distance = distance($row['name'],$curName);
					if($distance < 5) $aproved = true;
				}
				if($aproved){
					if ($return == "No restaurant found :(") {
						$return = array();
						$return = pushArray($return, $row['name'], $row['id'], $value, $row['score'],$row['address'],$row['schedule']);
					} 
					else {
						$return = pushArray($return, $row['name'], $row['id'], $value, $row['score'],$row['address'],$row['schedule']);
					}
				}
			}
		}
		return $return;
	}
?>
<?php
	include("../actions/connection.php");
	include("../actions/restaurant.php");

	$curName = $_GET['nameR'];
	$rests = getRestaurants();
	$return = "No restaurant found :(";

	if($curName == "")  $return = "Type the restaurant name!";
	else{
		$curName = strtolower($curName);
		$len = strlen($curName);
		foreach($rests as $row){
			if (stristr($curName, substr($row['name'], 0, $len))) {
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

	echo json_encode($return);
?>

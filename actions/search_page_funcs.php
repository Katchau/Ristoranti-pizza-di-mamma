<?php
	include_once('similarRestaurants.php');
	
	function filterRestaurants($rest_name, $local){
		$restaurant = ($rest_name != null && $rest_name != "" && $rest_name != " ") ? $rest_name : $_GET['restaurant'];
		$home = ($local != null && $local != "" && $local != " ") ? $local : $_GET['local'];
		if($home == null && $restaurant != null) $home = "";
		else if($restaurant == null) return null;
		$restaurants = getRestaurants();
		$return = "No restaurant found :(";
		$restaurant = strtolower($restaurant);
		$restaurants_found = getSimilarRestaurants($restaurant,$home,$restaurants,$return,true);
		return $restaurants_found;
	}
	
	function getRestaurantFilters($type){
		return "../res/" . $type . ".png"; //tem de ser png para manter transparencia (eu gosto de transparencia)
	}
	
	function displayImage($rest,$id,$morada,$horario,$score){
		$url = "../actions/restaurant_page.php?id=" . $id;
		echo '<div class="restaurants">';
		echo '<form method="get">';
		echo '<button type="submit" value="'. $id .'" name="id" formaction="'. $url . '">' ;
		$pic = getRestaurantPicture($id);
		$image_path = "../database/images/" . $id . "/";
		echo '<img src="' . $image_path . $pic['name'] . '" alt="restaurant_pics">';
		echo '</button></form>';
				echo '<h1>' . $rest . '</h1>';
		echo '<p> Morada: ' . $morada .  '</p>';
		echo '<p> Horario: ' . $horario . '</p>';
		echo '<p> Nº de Estrelas '. $score .  '</p>';
		echo '</div>';
		echo '<br>';
	}
	
	function displaySearch($rests){
		$size = sizeof($rests);
		for($i = 0; $i < $size; $i+=6 ){
			displayImage($rests[$i],$rests[$i+1],$rests[$i+3],$rests[$i+4],$rests[$i+2]);
		}
	}
	
	function displayAllRestaurants($local){
		$rests = getRestaurants();
		foreach($rests as $rest){
			if($local == null || $local == "" || $local == $rest['city'] || strtolower($rest['city']) == $local){
				displayImage($rest['name'],$rest['id'],$rest['address'],$rest['schedule'],$rest['score']);
			}
		}
	}
?>

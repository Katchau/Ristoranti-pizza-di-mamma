
<?php
include_once('../database/actions/user.php');
include_once('../database/actions/restaurant.php');

function get_profile_pic(){
	$picture = getPicture($_SESSION['email']);
	return $picture;
}

function display_restaurants(){
	$restaurants = getOwnedRestaurants($_SESSION['id']);
	$ref = "../actions/restaurant_page.php?id=";
	$paragraph = 0;
	echo '<form method="get">';
	foreach($restaurants as $rest){
		if($paragraph == 2){
			$paragraph = 0;
			echo '<br>';
		}
		$page = $ref . $rest['id'];
		echo '<button type="submit" value="' . $rest['id'] . '" name="id" formaction="'. $page .'">';
		echo $rest['name'];
		echo '<br>';
		$pic = getRestaurantPicture($rest['id']);
		$image_path = "../database/images/" . $rest['id'] . "/";
		echo '<img src="' . $image_path . $pic['name'] . '" alt="restaurant_pics">';
		echo '</button>';
		$paragraph ++;
	}
	echo '</form>';
}

?>

<?php
include_once('../database/actions/user.php');
include_once('../database/actions/restaurant.php');

function get_profile_pic(){
	$picture = getPicture($_SESSION['email']);
	return $picture;
}

function display_restaurants(){
	$restaurants = getOwnedRestaurants($_SESSION['id']);
	$ref = "../pages/restaurant_page.php?id=";
	echo '<form method="get">';
	foreach($restaurants as $rest){
		$page = $ref . $rest['id'];
		echo '<button type="submit" value="' . $rest['id'] . '" name="id" formaction="'. $page .'">';
		echo $rest['name'];
		echo '<br>';
		$pic = getRestaurantPicture($rest['id']);

        if($pic==null)
        {
            echo '<img src="../res/defaultRestaurantPhoto.png" alt="restaurant_pics">';
        }
        else {
            $image_path = "../database/images/" . $rest['id'] . "/";
            echo '<img src="' . $image_path . $pic['name'] . '" alt="restaurant_pics">';
            echo '</button>';
        }
	}
	echo '</form>';
}

?>
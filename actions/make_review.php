<?php

include_once('../database/actions/review.php');

function makeReview(){
	$review_critic=htmlspecialchars($_POST['criticReview']);
	$score=htmlspecialchars($_POST['score']);
	$id_restaurant=$_GET['id'];

	if($review_critic && $score)
	{
		if(strlen($review_critic)<20)
		{
			include_once('../actions/restaurant_page.php');
			return 'Too short. Please give a bigger critic.';

		}

		if($score<1 || $score>5)
		{
			include_once('../actions/restaurant_page.php');
			return 'Invalid score to the restaurants. Select a new score.';
		}

		if(insertReview($review_critic,$score,$id_restaurant,1)==0) //Para já ainda não tem acesso ao utilizador depois é preciso atualizar parâmetro
		{
			return 'Review made.';
		}
		else{
			include_once('../actions/restaurant_page.php');
			return 'The user already made a review to this restaurant.';
		}
	}
}

?>

<?php

	include_once('../database/actions/review.php');
	session_start();
	
	$review_critic=htmlspecialchars($_POST['criticReview']);
	$score=htmlspecialchars($_POST['score']);
	$id_restaurant=$_GET['id'];
	$id_user=$_SESSION['id'];

	if($review_critic && $score)
	{
		if(strlen($review_critic)<20)
		{
			include_once('../pages/restaurant_page.php');
			echo 'Too short. Please give a bigger critic.';

		}

		if($score<1 || $score>5)
		{
			include_once('../pages/restaurant_page.php');
			echo 'Invalid score to the restaurants. Select a new score.';
		}

		if(insertReview($review_critic,$score,$id_restaurant,$id_user)==0)
		{
			echo 'Review made.';
		}
		else{
			include_once('../pages/restaurant_page.php');
			echo 'The user already made a review to this restaurant.';
		}
	}
	
	header('Location: ../pages/restaurant_page.php?id=' . $_GET['id']);
?>

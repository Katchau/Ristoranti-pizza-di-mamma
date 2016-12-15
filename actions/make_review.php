<?php

	include_once('../database/review.php');
	session_start();
	
	$review_critic=htmlspecialchars($_POST['criticReview']);
	$score=htmlspecialchars($_POST['score']);
	$id_restaurant=htmlspecialchars($_GET['id']);
	$id_user=$_SESSION['id'];

	if($review_critic && $score)
	{

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

<?php

include_once('../actions/review.php');

$review_critic=$_POST['criticReview'];
$score=$_POST['score'];
$id_restaurant=$_POST['restaurant_id'];

if($review_critic && $score)
{
    if(strlen($review_critic)<20)
    {
        include_once('../actions/restaurant_page.php');
        echo 'Too short. Please give a bigger critic.';
        return;
    }

    if($score<1 || $score>5)
    {
        include_once('../actions/restaurant_page.php');
        echo 'Invalid score to the restaurants. Select a new score.';
        return;
    }

    if(insertReview($review_critic,$score,$id_restaurant,1)==0) //Para já ainda não tem acesso ao utilizador depois é preciso atualizar parâmetro
    {
        echo 'Review made.';
    }
    else{
        include_once('../actions/restaurant_page.php');
        echo 'The user already made a review to this restaurant.';
        return;
    }
}

?>

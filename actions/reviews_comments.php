<?php

    include_once('../database/actions/review.php');
    include_once('../database/actions/comment.php');
	session_start();
	
      $comment=htmlspecialchars($_POST['commentText']);
      $id_user=$_SESSION['id'];
      $id_rev=htmlspecialchars($_POST['commentSubmission']);
	  $id_restaurant = $_GET['rest_id'];

      if(!isset($_SESSION)){
        echo 'Must be logged in to comment.';
      }

      if($comment)
      {
        if(strlen($comment)<5)
        {
          echo 'Too short. Please give a bigger comment.';
        }

        if(insert_comment($comment,$id_user,$id_rev)==0)
        {
          echo 'Comment made.';
        }
        else{
          echo 'Error in comment.';
        }
	  }
	header('Location: ../pages/restaurant_page.php?id=' . $id_restaurant .'');
?>

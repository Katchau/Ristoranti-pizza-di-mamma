<?php

    include_once('../database/actions/review.php');

    function make_comment(){
      $comment=$_POST['comment'];
      $id_user=$_POST['id_user'];
      $id_rev=$_POST['id_rev'];

      if(!isset($_SESSION)){
        return 'Must be logged in to comment.';
      }

      if($comment)
      {
        if(strlen($comment)<20)
        {
          return 'Too short. Please give a bigger comment.';
        }

        if(insert_comment($comment,$id_user,$id_rev)==0)
        {
          return 'Comment made.';
        }
        else{
          return 'Error in comment.';
        }
      }
    }
?>

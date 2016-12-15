<?php
  include_once('connection.php');

  function get_comments($review_id){
    global $db;

    $rdb=$db->prepare('SELECT * FROM Replie WHERE id_rev = :id');
    $rdb->bindParam(':id', $review_id, PDO::PARAM_INT);
    $rdb->execute();

    $reviews=$rdb->fetchAll();

    return $reviews;
  }

  function insert_comment($comment,$id_user,$id_rev){
    global $db;

    $insert_comment=$db->prepare('INSERT INTO Replie VALUES(NULL,?,?,?,?)');
    $insert_comment->execute([$comment,$id_user,$id_rev,null]);

    return $insert_comment->errorCode();
  }
 ?>

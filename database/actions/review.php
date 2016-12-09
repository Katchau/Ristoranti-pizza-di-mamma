<?php

include_once('connection.php');

function getReviews(){
    global $db;

    $rdb=$db->prepare('SELECT * FROM Review WHERE id_restaurant = :id');
    $rdb->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $rdb->execute();

    $reviews=$rdb->fetchAll();

    return $reviews;
}

function getReviewsById(){
    global $db;

    $rdb=$db->prepare('SELECT * FROM Review WHERE id_restaurant = :id');
    $rdb->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
    $rdb->execute();

    $reviews=$rdb->fetchAll();

    return $reviews;
}

function insertReview($critic_review,$score,$id_restaurant,$id_user){

    global $db;

    $insertReview=$db->prepare('INSERT INTO Review VALUES(NULL,?,?,?,?)');
    $insertReview->execute([$critic_review,$score,$id_restaurant,$id_user]);

    return $insertReview->errorCode();

}

?>

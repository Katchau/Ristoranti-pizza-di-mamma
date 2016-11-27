<?php

        function getRestaurants(){
            global $db;

            $rdb=$db->prepare('SELECT * FROM Restaurant');
            $rdb->execute();

            $restaurants=$rdb->fetchAll();

            return $restaurants;

        }

        function getReviews($db){

            $rdb=$db->prepare('SELECT * FROM Review');
            $rdb->execute();

            $reviews=$rdb->fetchAll();

            return $reviews;


        }

        function getUsers($db){

            $rdb = $db->prepare('SELECT * FROM User');
            $rdb->execute();

            $reviews = $rdb->fetchAll();

            return $reviews;
        }

?>
<?php

        function getRestaurants(){
            global $db;

            $rdb=$db->prepare('SELECT * FROM Restaurant');
            $rdb->execute();

            $restaurants=$rdb->fetchAll();

            return $restaurants;

        }
	    function getRestaurant(){
			global $db;

			$rdb = $db->prepare('SELECT * FROM Restaurant WHERE id = :id');
			$rdb->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
			$rdb->execute();
			$result = $rdb->fetch();

			return $result;
		}
		
        function getReviews(){
			global $db;
			
            $rdb=$db->prepare('SELECT * FROM Review WHERE id_restaurant = :id');
			$rdb->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
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
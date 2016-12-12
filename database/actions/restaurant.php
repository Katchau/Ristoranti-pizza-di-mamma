<?php

include_once('connection.php');

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

		function getRestaurantById(){
			global $db;

			$rdb = $db->prepare('SELECT * FROM Restaurant WHERE id = :id');
			$rdb->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
			$rdb->execute();
			$result = $rdb->fetch();

			return $result;
		}
		
		function getRestaurantPicture($id){
			global $db;

			$rdb = $db->prepare('SELECT * FROM Picture WHERE id_restaurant = :id');
			$rdb->bindParam(':id', $id, PDO::PARAM_INT);
			$rdb->execute();
			$result = $rdb->fetch();

			return $result;
		}
		
		function getRestaurantPicturesById(){
			global $db;

			$rdb = $db->prepare('SELECT * FROM Picture WHERE id_restaurant = :id');
			$rdb->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
			$rdb->execute();
			$result = $rdb->fetchAll();

			return $result;
		}

		function insertRestaurant($name,$address,$contacts,$schedule,$owner_id){

			global $db;

			$insertUser=$db->prepare('INSERT INTO Restaurant VALUES(NULL,?,?,?,?,?,?,?,?)');
			$insertUser->execute([$name,$address,$contacts,$schedule,0,0,0,$owner_id]);

			return $insertUser->errorCode();

		}

?>

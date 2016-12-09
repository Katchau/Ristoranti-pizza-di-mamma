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

?>

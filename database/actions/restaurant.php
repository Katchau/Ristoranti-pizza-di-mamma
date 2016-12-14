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

		function insertRestaurant($name,$description,$address,$city,$contacts,$schedule,$owner_id,$type){

			global $db;

			$insertUser=$db->prepare('INSERT INTO Restaurant VALUES(NULL,?,?,?,?,?,?,?,?,?,?,?)');
			$insertUser->execute([$name,$description,$city,$address,$contacts,$schedule,0,0,0,$owner_id,$type]);

			return $insertUser->errorCode();

		}

    function isRestaurantOwner($email){
      global $db;

      $rdb = $db->prepare('SELECT owner_id FROM Restaurant WHERE id = :id');
      $rdb->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
      $rdb->execute();
      $result1 = $rdb->fetch();

      $ownerId = $result1[0];

      $stmt = $db->prepare('SELECT id FROM User WHERE email = ?');
      $stmt->execute(array($email));
      $result2 = $stmt->fetch();

      $userId = $result2[0];

      return ($ownerId == $userId);
    }

    function changeRestaurantName($name, $id){
      global $db;

      $stmt = $db->prepare('UPDATE restaurant SET name = ? WHERE id = ?');
      return $stmt->execute(array($name, $id));
    }

    function changeRestaurantDescription($description, $id){
      global $db;

      $stmt = $db->prepare('UPDATE restaurant SET description = ? WHERE id = ?');
      return $stmt->execute(array($description, $id));
    }

    function changeRestaurantAdress($adress, $city, $id){
      global $db;

      $stmt1 = $db->prepare('UPDATE restaurant SET address = ? WHERE id = ?');
      if ($stmt1->execute(array($adress, $id)) == 1){
        $stmt2 = $db->prepare('UPDATE restaurant SET city = ? WHERE id = ?');
        return $stmt2->execute(array($city, $id));
      }
      else{
        return 0;
      }
    }

    function changeRestaurantNumber($number, $id){
      global $db;

      $stmt = $db->prepare('UPDATE restaurant SET contacts = ? WHERE id = ?');
      return $stmt->execute(array($number, $id));
    }

    function changeRestaurantSchedule($schedule, $id){
      global $db;

      $stmt = $db->prepare('UPDATE restaurant SET schedule = ? WHERE id = ?');
      return $stmt->execute(array($schedule, $id));
    }

    function changeRestaurantType($type, $id){
      global $db;

      $stmt = $db->prepare('UPDATE restaurant SET type = ? WHERE id = ?');
      return $stmt->execute(array($type, $id));
    }

?>

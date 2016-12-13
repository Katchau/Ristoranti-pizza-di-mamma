<?php

include_once('connection.php');

function getUsers(){
    global $db;

    $rdb = $db->prepare('SELECT * FROM User');
    $rdb->execute();

    $users = $rdb->fetchAll();

    return $users;
}

function newUser($firstName,$lastName,$birthday,$password,$email){
    global $db;

    $insertUser=$db->prepare('INSERT INTO User VALUES(NULL,?,?,?,?,NULL,?)');
    $insertUser->execute([$firstName,$lastName,$birthday,$password,$email]);

    return $insertUser->errorCode();
}

function getPassword($email){
  global $db;

  $stmt = $db->prepare('SELECT password FROM User WHERE email = ?');
  $stmt->execute(array($email));
  $result = $stmt->fetch();
  return $result[0];
}

function getPicture($email){
  global $db;

  $stmt = $db->prepare('SELECT picture FROM User WHERE email = ?');
  $stmt->execute(array($email));
  $result = $stmt->fetch();
  return $result[0];
}

function getUserInfo($email){
  global $db;

  $stmt = $db->prepare('SELECT * FROM User WHERE email = ?');
  $stmt->execute(array($email));
  return $stmt->fetch();
}

function getOwnedRestaurants($id){
	global $db;

	$rdb = $db->prepare('SELECT * FROM Restaurant WHERE owner_id = ?');
    $rdb->execute(array($id));

    $rest = $rdb->fetchAll();

    return $rest;

}

function changeUserPassword($email,$newPassword){
  global $db;

  $stmt = $db->prepare('UPDATE user SET password = ? WHERE email = ?');
	$stmt->execute(array($newPassword, $email));
}

function changeUserName($email,$first_name,$last_name){
  global $db;

  $stmt1 = $db->prepare('UPDATE user SET firstName = ? WHERE email = ?');
	$stmt1->execute(array($first_name, $email));
  $stmt2 = $db->prepare('UPDATE user SET lastName = ? WHERE email = ?');
	$stmt2->execute(array($last_name, $email));
}

function changeUserEmail($email,$newEmail){
  global $db;

  $stmt = $db->prepare('UPDATE user SET email = ? WHERE email = ?');
	$stmt->execute(array($newEmail, $email));
}

function changeUserBirthday($email,$birthday){
  global $db;

  $stmt = $db->prepare('UPDATE user SET birthday = ? WHERE email = ?');
	$stmt->execute(array($birthday, $email));
}

?>

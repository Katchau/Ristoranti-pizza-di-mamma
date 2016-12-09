<?php

include_once('../actions/connection.php');

function getUsers(){
    global $db;

    $rdb = $db->prepare('SELECT * FROM User');
    $rdb->execute();

    $users = $rdb->fetchAll();

    return $users;
}

function newUser($firstName,$lastName,$password,$email){
    global $db;

    $insertUser=$db->prepare('INSERT INTO User VALUES(NULL,?,?,?,?)');
    $insertUser->execute([$firstName,$lastName,$password,$email]);

    return $insertUser->errorCode();
}

function getPassword($email, $password){
  global $db;

  $stmt = $db->prepare('SELECT password FROM User WHERE email = ?');
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

?>
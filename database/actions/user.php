<?php

include_once('connection.php');

function getUsers(){
    global $db;

    $rdb = $db->prepare('SELECT * FROM User');
    $rdb->execute();

    $users = $rdb->fetchAll();

    return $users;
}

function newUser($firstName,$lastName,$password,$email){
    global $db;

    $insertUser=$db->prepare('INSERT INTO User VALUES(NULL,?,?,?,?,?)');
    $insertUser->execute([$firstName,$lastName,$password,$email,null]);

    return $insertUser->errorCode();
}

function getPassword($email){
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

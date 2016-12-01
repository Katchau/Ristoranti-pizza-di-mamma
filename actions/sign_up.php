<?php

include_once('user.php');
//session_start(); Necessário para quando implementado o login do utilizador

$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$password=$_POST['password'];
$passwordConfirmed=$_POST['passwordConfirm'];
$email=$_POST['email'];

if($firstName && $lastName && $password && $passwordConfirmed && $email){

    if(strlen($password)<8){
        include_once('register_page.php');
        echo 'Password is too short. Please choose a new one.';
        return;
    }

    if($password!==$passwordConfirmed){
        include_once('register_page.php');
        echo 'Password confirmation does not match.';
        return;
    }

    if(newUser($firstName,$lastName,$password,$email)==0){
        include_once('logged_page.php');
    }
    else {
        include_once('register_page.php');
        echo 'Invalid account. Email already exists.';
        return;
    }
}

?>

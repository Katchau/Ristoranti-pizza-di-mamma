<?php

include_once('user.php');
//session_start(); Necessário para quando implementado o login do utilizador

$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$password=$_POST['password'];
$passwordConfirmed=$_POST['passwordConfirm'];
$email=$_POST['email'];

if($firstName && $lastName && $password && $passwordConfirmed && $email){

    if(strlen($password)<8)
    {
        echo 'Password is to short. Please choose a new one.';
        return;
    }

    if($password!==$passwordConfirmed)
    {
        echo 'Password confirmation does not match.';
        return;
    }

    if(newUser($firstName,$lastName,$password,$email)==0)
    {
        echo 'Welcome.';
    }
    else {
        echo 'Invalid account. Email already exists.';
        return;
    }

}

?>
<?php

session_start();

echo "Hello World</br>";
echo "Register script in progress...</br>";

echo $_POST['name']."</br>";
echo $_POST['surname']."</br>";
echo $_POST['email']."</br>";
echo $_POST['password']."</br>";
echo $_POST['nick']."</br>";

include_once ('UserHandler.php');

if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nick'])){
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$nick = $_POST['nick'];
	$password = $_POST['password'];
	
	/*TODO: Check if user exists!!!*/
	
	$user = User::NewUser($name, $surname, $email, $password, $nick);
	if($user->isSaved()){
		echo 'Reg successful!';
	}
	else{
		echo 'Reg un-successful!';
	}
}
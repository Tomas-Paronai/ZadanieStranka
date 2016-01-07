<?php

session_start();

echo "Hello World</br>";
echo "Login script in progress...</br>";
echo $_POST['login-key'] .'</br>';
echo $_POST['login-pass'] .'</br>';

include_once ('UserHandler.php');

if(isset($_POST['login-key']) && $_POST['login-pass'] != ""){
	$login = User::Login($_POST['login-key'], $_POST['login-key']);
	if($login != null){
		$_SESSION['login'] = $login;
	}
	else{
		$_SESSION['login'] = 'Invalid login.';
	}
	
	header('Location: ../index.php?page=comunity');
	exit();
	//echo $_SESSION['login'];
}
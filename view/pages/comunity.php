<?php

if(isset($_GET['comm'])){
	if($_GET['comm'] == 'logoff'){
		unset($_SESSION['login']);
	}
}
	
?>

<link rel="stylesheet" type="text/css" href="style/pages/comunity.css">

<div><h1 align="center" >Evelynpa comunity</h1></div>

<?php
	include_once ('API/UserHandler.php');

	if(isset($_GET['sub'])){
		$pagePath = 'view/pages/sub/'.$_GET['sub'].'.php';
		include_once ($pagePath);
	}
	else{
		if(isset($_SESSION['login'])){
			$login = $_SESSION['login'];
			if(is_numeric($login)){
				$user = User::Exist($login);
				echo '<div class="welcome-message">Welcome '.$user->getData('name').' !</div>';
				echo '<a class="welcome-message" href="?page=comunity&comm=logoff">Log off</a>';
				if($user->getData('name') == 'admin'){
					echo '<a class="welcome-message" href="?page=import">Import</a>';
				}
			}
			else{
				echo '<div class="welcome-message">'.$login.'</div>';
				include_once ('view/pages/sub/login.php');
			}
		}
		else{
			include_once ('view/pages/sub/login.php');
		}
	}
?>

<ul id="quotes">
	<li class="quote-item">The artist is a receptacle for emotions that come from all over the place: from the sky, from the earth, from a scrap of paper, from a passing shape, from a spider's web.</li>
	<li class="quote-item">The aim of art is to represent not the outward appearance of things, but their inward significance.</li>
	<li class="quote-item">The purpose of art is washing the dust of daily life off our souls.</li>
	<li class="quote-item">Art enables us to find ourselves and lose ourselves at the same time.</li>
</ul>


<?php

if(isset($_GET['page']) && $_GET['page']  != ""){
	
	$pagesPath = 'view/pages/' .$_GET['page'].'.php';
	include_once ($pagesPath);
	
}
else{
	include_once ('view/pages/home.php');
}

?>
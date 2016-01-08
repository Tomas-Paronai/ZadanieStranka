<?php
session_start();

include ("config.php");
?>

<!DOCTYPE html>
<html>
<head>	
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<link rel="stylesheet" type="text/css" href="style/pages/body.css">	
		
	
	
</head>
<body>
<div id="page">
	<div id="header-main">
		<?php
			include_once ('view/includes/header.php');
		?>
	</div>
	
	<div id="body-main">
		<?php 
			include_once ('view/includes/body.php');
		?>
	</div>
	
	<div id="footer-main">
		<?php 
			include_once ('view/includes/footer.php');
		?>
	</div>
</div>
</body>

</html>
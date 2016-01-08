<?php
	
?>

<link rel="stylesheet" type="text/css" href="style/pages/import.css">

<form method="POST" action="API/upload.php" enctype="multipart/form-data">
	<ul id="uload-form">
		<li>File: <input type="file" name="uploadFile" id="uploadFile"></li>
		<li>Product name: <input type="text" name="product-name"></li>
		<li>Discription: <textarea rows="5" cols="50" name="product-discription"></textarea></li>
		<li>Price: <input type="number" name="product-price"> eur</li>
		<li><input type="submit" value="Upload" name="submit"></li>		
	</ul>
</form>
<?php

session_start();

include_once ('ProductHandler.php');

echo "Hello World!</br>";
echo "Upload in progress...</br>";

$name = $_FILES['uploadFile']['name'];
$size = $_FILES['uploadFile']['size'];
$type = $_FILES['uploadFile']['type'];
$type = pathinfo($name,PATHINFO_EXTENSION);
$tmp_name = $_FILES['uploadFile']['tmp_name'];

echo $name . '</br>';
echo $size . '</br>';
echo $type . '</br>';
echo $tmp_name . '</br>';

if($size > 2097152){
	$_SESSION['file-err'] = 'File is to big. (MAX 2MB)';
}
else if($type != 'png' && $type != 'jpg' &&  $type != 'jpeg' &&  $type != 'JPG' &&  $type != 'JPEG'){
	$_SESSION['file-err'] = 'Invalid file format. (jpg, jpeg, png)';
}
else if(!isset($_POST['product-name']) || !isset($_POST['product-discription']) || !isset($_POST['product-category']) || !isset($_POST['product-price'])){
	$_SESSION['file-err'] = 'Missin required fields';
}
else{
	$upFile = Product::UploadProduct($_POST['product-name'], $_POST['product-category'], $_POST['product-discription'], $_POST['product-price'], $tmp_name);
	if($upFile->isUploaded()){
		unset($_SESSION['file-err']);
		echo 'SUCCESS!';
		header('Location: ../index.php?page=import');
		exit();
	}
}

if(isset($_SESSION['file-err'])){
	echo $_SESSION['file-err'];
}





<?php

include_once ('API/CategoryHandler.php');

	
?>

<link rel="stylesheet" type="text/css" href="style/pages/import.css">

<form method="POST" action="API/upload.php" enctype="multipart/form-data">
	<table>
		<tr>
			<td class="field-title"><div>File:</div></td>
			<td><input class="input-field" type="file" name="uploadFile" id="uploadFile"></td>
		</tr>
		<tr>
			<td class="field-title"><div>Product name:</div></td>
			<td><input class="input-field" type="text" name="product-name"></td>
		</tr>
		<tr>
			<td class="field-title"><div>Product category:</div></td>
			<td>
			<?php
				$categories = Category::CatArray();
				for($i=0;$i<count($categories);$i++){
					echo '<input type="radio" name="product-category" value="'.$categories[$i]['categoryid'].'">'.$categories[$i]['categoryname'].'<br>';
				}
			?>
			</td>
		</tr>
		<tr>
			<td class="field-title"><div>Discription:</div></td>
			<td><textarea class="input-field" rows="5" cols="50" name="product-discription"></textarea></td>
		</tr>
		<tr>
			<td class="field-title"><div>Price:</div></td>
			<td><input class="input-field" type="number" name="product-price"> eur</td>
		</tr>
		<tr>
			<td><input type="submit" value="Upload" name="submit"></td>
		</tr>
	</table>
</form>
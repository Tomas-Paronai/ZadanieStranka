<?php
	
include_once ('API/DataHandler.php');
include_once ('API/ProductHandler.php');
	
?>

<link rel="stylesheet" type="text/css" href="style/pages/products.css">

<div class="products-navigation">
	<table id="categories" cellspacing="0" cellpadding="0">
		<tr>
			<?php			
			$HandlerDB = new DBHandler();
			$query = 'SELECT * FROM categories';
			$HandlerDB->query($query);
			$categories = $HandlerDB->resultSet();			
			for($i=0;$i<count($categories);$i++){
				$name = $categories[$i]['categoryname'];
				echo '<td class="category-item"><a class="link" href="?page=products&cat='.$name.'">'.$name.'</a></td>';
			}				
			?>
		</tr>
	</table>
</div>

<div class="products-display-main">
	<ul class="products-list">
		
		<?php
		
		$tempProduct = Product::FirstItem();
		$allIds = $tempProduct->getProductsId();
		
		for($i=0;$i<count($allIds);$i++){
			$product = Product::ExistingItem($allIds[$i]['productid']);
			$title = $product->getData('title');
			$imagePath = 'lib/products/img/'.$title.'/1.jpg';
			
			$discription = 'DISCRIPTION IN PROGRESS';
			
			echo '<li class="single-cell">';
				echo '<div class="container-product">';
					echo '<div class="image-holder"><a href=""><img class="image" alt="product-image" src="'.$imagePath.'"></a></div>';
					echo '<div class="information-holder">';
						echo '<ul class="product-detail-list">';
						echo '<li><h1 class="product-title">'.$product->getData('name').'</h1></li>';
						echo '<li><div class="short-discription">'.$discription.'</div></li>';
						echo '<li><div class="price">'.$product->getData('price').'</div>';
						echo '</ul>';
					echo '</div>';
				echo '</div>';
			echo '</li>';
		}
		
		?>
		
	</ul>
</div>


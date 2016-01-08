<?php
	
include_once ('API/CategoryHandler.php');
include_once ('API/ProductHandler.php');
	
?>

<link rel="stylesheet" type="text/css" href="style/pages/products.css">

<div class="products-navigation">
	<table id="categories" cellspacing="0" cellpadding="0">
		<tr>
			<?php			
			$categories = Category::CatArray();			
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
			$imagePath = 'lib/products/img/'.$product->getId().'/1.jpg';
			
			
			echo '<li class="single-cell">';
				echo '<div class="container-product">';
					echo '<div class="image-holder"><a href=""><img class="image" alt="product-image" src="'.$imagePath.'"></a></div>';
					echo '<div class="information-holder">';
						echo '<ul class="product-detail-list">';
						echo '<li><h1 class="product-title">'.$product->getData('name').'</h1></li>';
						echo '<li><div class="short-discription">'.$product->getData('discription').'</div></li>';
						echo '<li><div class="price">'.$product->getData('price').'</div>';
						echo '</ul>';
					echo '</div>';
				echo '</div>';
			echo '</li>';
		}
		
		?>
		
	</ul>
</div>


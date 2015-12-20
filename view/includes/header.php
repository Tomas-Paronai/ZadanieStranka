<?php
	include_once ('API/ProductHandler.php');
?>

<div class="header-galery">
	<table class="galery-table" cellspacing="0" cellpadding="0">
		<tr>
			<?php
				$max = 4;
				$tempProduct = Product::FirstItem();
				if($tempProduct->getDataCount() < 4){
					$max = $tempProduct->getDataCount();
				}
				
				$allIds = $tempProduct->getProductsId();
				for($i=0;$i<$max;$i++){
					
					$product = Product::ExistingItem($allIds[$i]['productid']);
					$name = $product->getData('name');
					$price = $product->getData('price');
					$imgPath = "lib/products/img/".$name."/1.jpg";
										
					echo '<td class="galery-item">';
					echo '<div class="item-img"><img class="item-pic" alt="product.jpg" src="'.$imgPath.'"> </div>';
					echo '<div class="item-label">'.$name.'</div>';
					echo '<hr class="item-hr">';
					echo '<div class="item-label">'.$price.' eur</div>';
					echo '</td>';
				}
			?>
			
		</tr>
		<tr class="header-navigation">
			<td class="navigation-item">Home</td>
			<td class="navigation-item">Products</td>
			<td class="navigation-item">Komunity</td>
		</tr>
	</table>
</div>

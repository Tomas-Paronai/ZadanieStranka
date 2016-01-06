<?php
	include_once ('API/ProductHandler.php');
?>

<div class="header-galery">
	<table class="galery-table" cellspacing="0" cellpadding="0">
		<tr class="new-items">
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
					$title = $product->getData('title');
					$price = $product->getData('price');
					$imgPath = "lib/products/img/".$title."/1.jpg";
										
					echo '<td class="galery-item">';
					echo '<div class="item-img"><img class="item-pic" alt="product.jpg" src="'.$imgPath.'"> </div>';
					echo '<div class="item-label">'.$name.'</div>';
					echo '<hr class="item-hr">';
					echo '<div class="item-label">'.$price.' eur</div>';
					echo '</td>';
				}
			?>
			
		</tr>
		<tr>
			<td colspan="4" align="center">
				<table class="header-navigation" cellspacing="0" cellpadding="0">	
					<tr class="header-nav-buttons">
						<td class="navigation-item"><a class="link" href="?page=home">Home</a></td>
						<td class="navigation-item"><a class="link" href="?page=products">Products</a></td>
						<td class="navigation-item"><a class="link" href="?page=comunity">Comunity</a></td>
					</tr>
				</table>
			</td>
			
		</tr>
	</table>
</div>

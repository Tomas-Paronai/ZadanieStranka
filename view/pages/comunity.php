<?php

	
?>



<div><h1 align="center" >Evelynpa comunity</h1></div>

<?php
	if(isset($_GET['sub'])){
		$pagePath = 'view/pages/sub/'.$_GET['sub'].'.php';
		include_once ($pagePath);
	}
	else{
		include_once ('view/pages/sub/login.php');
	}
?>

<ul id="quotes">
	<li class="quote-item">The artist is a receptacle for emotions that come from all over the place: from the sky, from the earth, from a scrap of paper, from a passing shape, from a spider's web.</li>
	<li class="quote-item">The aim of art is to represent not the outward appearance of things, but their inward significance.</li>
	<li class="quote-item">The purpose of art is washing the dust of daily life off our souls.</li>
	<li class="quote-item">Art enables us to find ourselves and lose ourselves at the same time.</li>
</ul>


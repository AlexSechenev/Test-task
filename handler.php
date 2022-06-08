<?php
	include 'CProducts.php';
	
	$request = $_REQUEST;
	$products = new CProducts();
	
	switch ($request['type']) {
		case 'hide':
			$products->hide_row($request['id']);
			break;
		case 'minus':
			$products->dec_quantity($request['id']);
			echo $products->get_quantity($request['id']);
			break;
		case 'plus':
			$products->inc_quantity($request['id']);
			$products->get_quantity($request['id']);
			break;
	}
?>


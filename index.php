<html>
  <head>
    <title>Таблица</title>
  </head>
  <body>
    <?php
		include 'CProducts.php';
	
		$products = new CProducts();
		$products->get_products(4);
		$products->print_table();
	?>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="Scripts.js"></script>
  </body>
</html>
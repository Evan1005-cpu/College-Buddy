<?php
// Example PHP code for fetching products from database
$products = array(
	array('id' => 1, 'name' => 'Product 1', 'price' => 19.99),
	array('id' => 2, 'name' => 'Product 2', 'price' => 9.99),
	// ...
);

header('Content-Type: application/json');
echo json_encode($products);
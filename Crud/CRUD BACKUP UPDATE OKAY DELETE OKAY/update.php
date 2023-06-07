<!DOCTYPE html>
<html>
<head>
	<title>Update Product</title>
</head>
<link rel="stylesheet" href="update.css">
<body>
	<h2>Update Product</h2>

	<?php
		require_once('product.php');

		$product_id = $_GET['product_id'];
		$myProduct = new Product();
		$product = $myProduct->getProductById($product_id);
	?>
	<div class="contents">
	<form action="productroute.php" method="post">
		<label for="product_id">
		<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
		</label>
		 </label>Product
		 <label for="product_name">
			<input type="text" name="product_name" value="<?php echo $product['product_name']; ?>">
		 </label><br>
		<label for="price">Price:
        <input type="text" name="price" value="<?php echo $product['price']; ?>"><br>
		</label>
        <label for="category">Category:
        <input type="text" name="category" value="<?php echo $product['category']; ?>"><br>
		</label>
		<label for="manufacturer">Manufacturer:
		<input type="text" name="manufacturer" value="<?php echo $product['manufacturer']; ?>"><br>
		</label>

		<input type="submit" name="submit" value="Update">
	</form>
	</div>
</body>
</html>

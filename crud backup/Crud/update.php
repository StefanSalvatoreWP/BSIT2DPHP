<!DOCTYPE html>
<html>
<head>
	<title>Update Student</title>
</head>
<body>
	<h2>Update Student</h2>

	<?php
		require_once('product.php');

		$product_id = $_POST['product_id'];
		$myProduct = new Product();
		$product = $myProduct->getProductById($product_id);
	?>

	<form action="productroute.php" method="post">
	<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
		<label for="productname">product:</label>
        <input type="text" name="productname" value="<?php echo $product['productname']; ?>"><br>
        <label for="price">Price:</label>
        <input type="text" name="price" value="<?php echo $product['price']; ?>"><br>
		<label for="category">Category:</label>
		<input type="number" name="category" value="<?php echo $product['category']; ?>"><br>
		<label for="manufacturer">Manufacturer:</label>
		<input type="number" name="manufacturer" value="<?php echo $product['manufacturer']; ?>"><br>

		<input type="submit" name="submit" value="Update">
	</form>
</body>
</html>

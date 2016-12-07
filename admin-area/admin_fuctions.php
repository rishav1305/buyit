<?php
	$con = mysqli_connect('127.0.0.1', 'root', 'Imagenius@115', 'buyit_shoes');
	if (mysqli_connect_errno()) {
		echo 'Database Connection failed with the following erors:' . mysqli_connect_errno();
		die();
	}

 function getCategories(){
 	global $con;

 	$categories_sql = "SELECT * FROM categories";
 	$categories_query = mysqli_query($con, $categories_sql);

 	while ($category = mysqli_fetch_assoc($categories_query)) {
 		$category_name = $category['Name'];
 		echo "<option>$category_name</option>";
 	}
 }
 function getBrands(){
 	global $con;

 	$brands_sql = "SELECT * FROM brands";
 	$brands_query = mysqli_query($con, $brands_sql);

 	while ($brands = mysqli_fetch_assoc($brands_query)) {
 		$brand_name = $brands['Name'];
 		echo "<option>$brand_name</option>";
 	}
 }
 function insertProduct(){

 	global $con;

 	if (isset($_POST['insert_product'])) {
 		$product_sku = $_POST['product_sku'];
 		$product_name = $_POST['product_name'];
		$product_long_name = $_POST['product_long_name'];
		$product_price = $_POST['product_price'];
		$product_our_price = $_POST['product_our_price'];
		$product_categories = $_POST['product_categories'];
		$product_brands = $_POST['product_brands'];
		$product_desc = $_POST['product_desc'];
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		$product_stock = $_POST['product_stock'];

		move_uploaded_file($product_image_tmp, "images/$product_image");

		$insert_sql = "INSERT INTO products (ProductSKU, ProductName, ProductLongName, ProductPrice, ProductOurPrice, ProductCategory, ProductBrand, ProductDescription, ProductImage, ProductStock) values ('$product_sku','$product_name', '$product_long_name', '$product_price', '$product_our_price', '$product_categories', '$product_brands', '$product_desc', '$product_image', '$product_stock')";

		$insert_query = mysqli_query($con, $insert_sql);
		if ($insert_query) {
			echo "<script>alert('Product has been added to the database')</script>";
			echo "<script>window.open('add_product.php', '_self')</script>"	;
		}
  	}
 }

?>
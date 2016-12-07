<?php include ("admin_fuctions.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>buYit - Add a product</title>
	<link rel="stylesheet" href="add_product.css">
	<link rel="stylesheet" href="sidebar.css">	
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />
</head>
<body>
	<?php include ("sidebar.php"); ?>
	<form class="form" action="add_product.php" method="post" enctype="multipart/form-data">
	<h1 class="heading">Add a Product</h1>
    	<table width="100%">
    		<tr>
    		<td width = "40%" align="right">Product SKU :</td>
  			<td width = "60%" align="left"><input type="text" style="margin-left:32px" class="textbox" placeholder="Enter the product's Stock Key Unit" name="product_sku"></td>
  			</tr>
    		<tr>
    		<td width = "40%" align="right">Product Name :</td>
  			<td width = "60%" align="left"><input type="text" style="margin-left:32px" class="textbox" placeholder="Enter the product's name" required name="product_name"></td>
  			</tr>
    		<tr>
    		<td width = "40%" align="right">Product Long Name :</td>
  			<td width = "60%" align="left"><input type="text" style="margin-left:32px" class="textbox" placeholder="Enter the product's long name" required name="product_long_name"></td>
  			</tr>
    		<tr>
    		<td width = "40%" align="right">Price :</td>
  			<td width = "60%" align="left"><input type="text" style="margin-left:32px" class="textbox" placeholder="Enter the price of the product" required name="product_price"></td>
  			</tr>
        <td width = "40%" align="right"> Our Price :</td>
        <td width = "60%" align="left"><input type="text" style="margin-left:32px" class="textbox" placeholder="Enter our price of the product" required name="product_our_price"></td>
        </tr>
    		<tr>
    		<td width = "40%" align="right">Category :</td>
  			<td width = "60%" align="left"><input list="categories" style="margin-left:32px" class="textbox" placeholder="Select the Category" required name="product_categories" value="$category_id">
        <datalist id="categories">
          <?php getCategories(); ?>
        </datalist>
        </td>
  			</tr>
    		<tr>
    		<td width = "40%" align="right">Brand :</td>
  			<td width = "60%" align="left"><input list="brands" style="margin-left:32px" class="textbox" placeholder="Select the Brand" required name="product_brands" value="$brand_id">
        <datalist id="brands">
          <?php getBrands(); ?>
        </datalist>
        </td>
  			</tr>
    		<tr>
    		<td width = "40%" align="right">Description :</td>
  			<td width = "60%" align="left"><input type="text" style="margin-left:32px" class="textbox" placeholder="Describe the product" required name="product_desc"></td>
  			</tr>
    		<tr>
    		<td width = "40%" align="right">Image :</td>
  			<td width = "60%" align="left"><input type="file" style="margin-left:32px" class="textbox" placeholder="Select images" required name="product_image"></td>
  			</tr>
    		<tr>
    		<td width = "40%" align="right">Stock :</td>
  			<td width = "60%" align="left"><input type="text" style="margin-left:32px" class="textbox" placeholder="Enter the Stock left" required name="product_stock"></td>
  			</tr>
    		<tr>
  		</table>
      <input type="submit" class="button" name="insert_product" value="Add"><br>
  	</form>
</body>
</html>
<?php insertProduct(); ?>
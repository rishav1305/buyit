<?php session_start(); include("functions.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>buYit - Details</title>
    <link rel="stylesheet" href="css/details_page.css">
    <link rel="stylesheet" href="css/header_footer.css">
	  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />
    <link rel="shortcut icon" href="logo.ico">
  <link rel="stylesheet" href="css/cart.css">
	  <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/login_modal.css">
    <link rel="stylesheet" href="css/display_products.css">
  </head>
  <body>
    <?php include('header.php'); ?>
    <main style="margin-top:5%">
      <ul class="products">
          <?php
            global $con;
            if (isset($_GET['category_id']) ) {
              $cat_id = $_GET['category_id'];
              $cat_sql = "SELECT * FROM products WHERE ProductCategoryID='$cat_id'";
              $cat_query = mysqli_query($con, $cat_sql);
              
              $rows = mysqli_num_rows($cat_query);
              if($rows > 0){  
                while ($product = mysqli_fetch_array($cat_query)) {
                    $product_id = $product['ProductID'];
                    $product_name = $product['ProductName'];
                    $product_price = $product['ProductPrice'];
                    $product_our_price = $product['ProductOurPrice'];
                    $product_image = $product['ProductImage'];
                    $product_brand = $product['ProductBrandID'];

                    echo "<li>
                        <div class='product'>";

                    $brands_sql = "SELECT * FROM brands WHERE ID='$product_brand'";
                    $brands_query = mysqli_query($con, $brands_sql);
                    
                    while($brand = mysqli_fetch_array($brands_query)) {
                      $brand_id = $brand['ID'];
                      $brand_name = $brand['Name'];
                      $brand_image = $brand['Image'];

                      echo "<img src=$brand_image alt=$brand_image class='product_brand'>";
                    }

                    echo "<img class='product_image'  src='admin-area/images/$product_image' alt=$product_name><br><br><center>
                            <h2 class='product_name'>$product_name</h2></center>
                            <br><center>
                            <table>
                                <tr class='list_price'>
                                    <td>List Price : </td>
                                    <td><s>&#8377 $product_price</s></td>    
                                </tr> 
                                <tr class='our_price'>
                                    <td>Our Price : </td>
                                    <td>&#8377 $product_our_price</td>
                                </tr>
                            </table></center>
                            <br>
                            <a href='details_page.php?product_id=$product_id' class='display_button'>Details</a>
                            <a href='categories_page.php?add_cart=$product_id' class='display_button'>Add to Cart</a>
                                </div>
                            </li>";
                  
                }
              }
              else{
                echo "<div class='products' style='margin:50px 0'>No Items in this category</div>";
              }
            }
          ?>
      </ul>
    </main>
  </body>
</html>
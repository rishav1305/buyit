<?php session_start(); include("functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>buYit - Exclusive Footwear Store</title>
	<link rel="shortcut icon" href="logo.ico">	
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="css/modal.css">
	<link rel="stylesheet" href="css/login_modal.css">
	<link rel="stylesheet" href="css/cart.css">
	<link rel="stylesheet" href="css/display_products.css">
	<script src="js/animation.js"></script>
</head>
<body>
	<div width="100%" class="header" id="header">
		<h1 class="top_text">buYit</h1>
		<a href="#" class="search_button">&#128269</a>
		<?php loginHeader(); ?>
	</div>
	<div>
		<nav>
			<ul>
				<?php productCategories(); ?>
			</ul>
			<div id="cartButton" class="shopping_cart">
				<img src="images/shopping_cart_icon.png" alt="cart" class="cart_image">
				<button class="cart"> CART <big><strong>[<?php checkCart(); ?>]</strong></big></button>
				<?php include("cart.php"); ?>
			</div>
		</nav>
	</div>
	<div>
		<img src="images/background (3).jpg" class="background_image" id="backgroundImage" alt="Looking out at the Pacific" width="100%" class="articleImage" />
	</div>
	<h1 class="hr">If you can't stop thinking about it...then <strong><big>buYit!!!</big></strong></h1>
	<div style="background-color:#fff">
		<div class="brands">
			<div>
				<?php productBrands(); ?>
			</div>
		</div>
	</div>
	<h1 class="latest_products_header">Latest Products</h1>
	<div width="100%">
		<table class="products">
				<tr>
				<?php displayProducts(); ?>
				</tr>

	<?php cart(); ?>
		</table>
	</div>
	<footer>Copyright &copy 2016 buYit, LLC  All Rights Reserved</footer>
	<script src="js/main_image.js"></script>
</body>
</html>
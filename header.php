<div width="100%" class="header">
		<a href="main.php" class="top_text">buYit</a>
		<a href="#" class="search_button">&#128269</a>
		<?php loginHeader(); ?>
</div>
<div>
	<nav>
		<table class="nav_table" width="100%">
			<?php 
				$categories_sql = "SELECT * FROM categories";
				$categories_query = mysqli_query($con, $categories_sql);
				while($category = mysqli_fetch_assoc($categories_query)) {
					$category_id = $category['ID'];
					$category_name = $category['Name']; 
					$category_name_upper = strtoupper($category_name);
					echo" <td class='nav_table_categories'><a href='categories_page.php?category_id=$category_id' class='nav_table_category'>$category_name_upper</a></td>";
				}
			?>
		</table>
		<?php cart(); ?>
		<div id="cartButton" class="shopping_cart">
			<img src="images/shopping_cart_icon.png" alt="cart" class="cart_image">
			<button id="cartButton" class="cart"> CART <big><strong>[<?php checkCart(); ?>]</strong></big></button>
			<?php include("cart.php"); ?>
		</div>
	</nav>
</div>
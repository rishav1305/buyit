<?php
	$con = mysqli_connect('127.0.0.1', 'root', 'Imagenius@115', 'buyit_shoes');
	if (mysqli_connect_errno()) {
		echo 'Database Connection failed with the following erors:' . mysqli_connect_errno();
		die();
	}

	function productCategories(){
		global $con;
		$categories_sql = "SELECT * FROM categories";
		$categories_query = mysqli_query($con, $categories_sql);
		
		while($category = mysqli_fetch_assoc($categories_query)) {
			$category_id = $category['ID'];
			$category_name = strtoupper($category['Name'])	;

			echo "<li><a href='categories_page.php?category_id=$category_id'>$category_name</a></li>";
		}
	}

	function productBrands(){
		global $con;
		$brands_sql = "SELECT * FROM brands ORDER BY RAND()";
		$brands_query = mysqli_query($con, $brands_sql);
		
		while($brand = mysqli_fetch_assoc($brands_query)) {
			$brand_id = $brand['ID'];
			$brand_name = $brand['Name'];
			$brand_image = $brand['Image'];
			$brand_desc = $brand['Description'];

			echo "<a href='brands_page.php?brand_id=$brand_id'?><img src=$brand_image alt=$brand_image class='brand'></a>";
			
		}
	}

	function displayProducts(){
		global $con;
		$products_sql = "SELECT * FROM products ORDER BY RAND() LIMIT 0,5";
		$products_query = mysqli_query($con, $products_sql);
		
		while ($product = mysqli_fetch_array($products_query)) {
			$product_id = $product['ProductID'];
			$product_name = $product['ProductName'];
			$product_price = $product['ProductPrice'];
			$product_our_price = $product['ProductOurPrice'];
			$product_image = $product['ProductImage'];
			$product_brand = $product['ProductBrandID'];

			echo "<td>
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
	                    <a href='main.php?add_cart=$product_id' class='display_button'>Add to Cart</a>
	                </div>
	            </td>";
		}
	}

	
	function detailBody(){
		global $con;
		if (isset($_GET['product_id']) ) {
			$pro_id = $_GET['product_id'];
			$pro_sql = "SELECT * FROM products WHERE ProductID='$pro_id'";
			$pro_query = mysqli_query($con, $pro_sql);
			
			while ($pro = mysqli_fetch_array($pro_query)) {
				$pro_id = $pro['ProductID'];
				$pro_long_name = $pro['ProductLongName'];
				$pro_price = $pro['ProductPrice'];
				$pro_our_price = $pro['ProductOurPrice'];
				$pro_image = $pro['ProductImage'];
				$pro_brand = $pro['ProductBrandID'];
				$pro_desc = $pro['ProductDescription'];
				$pro_stock = $pro['ProductStock'];

				echo "
				<div class='image_bar'>
					<img src='admin-area/images/$pro_image' class='detail_image'>
					<div class='detail_buttons'>
						<a href='details_page.php?add_cart=$pro_id'><button class='button'>Add to Cart</button></a>
						<a href='#'><button class='button'>Buy Now</button></a>
					</div>
				</div>
				<form class='form'>
					<div>";

				$brands_sql = "SELECT * FROM brands WHERE Name='$pro_brand'";
				$brands_query = mysqli_query($con, $brands_sql);
				
				while($brand = mysqli_fetch_array($brands_query)) {
					$brand_id = $brand['ID'];
					$brand_name = $brand['Name'];
					$brand_image = $brand['Image'];

				echo "<img src=$brand_image alt=$brand_image class='detail_brand'>";
				}
				echo "<h1>$pro_long_name</h1><hr>
						<div>
							<ul>
								<li>COLORS : </li>
								<li><a href='#' class='color'>O</a></li>
								<li><a href='#' class='color'>O</a></li>
								<li><a href='#' class='color'>O</a></li>
							</ul>
						</div>
					</div>
					<div>
						<ul>
							<li>SIZES : </li>
							<li><a href='#' class='size'>S</a></li>
							<li><a href='#' class='size'>M</a></li>
							<li><a href='#' class='size'>L</a></li>
						</ul>
					</div>
					<div class='detail_price'>
						<h5><s>List Price : $pro_price</s></h5>
						<h5><big>Our Price : $pro_our_price</big></h5>
					</div>
					<div>
		   				<h5>Only $pro_stock left in stock!!!</h5>
		   			</div>
		   			<div>
		   				<h5>Check Availability : 
		   				<input type='text' class='textbox' placeholder='Enter your PINCODE'>
		   				</h5>
		   			</div>
		   			<div class='detail_desc'>
		   				$pro_desc
		   			</div>
		    	</form>";
			}
		}
	}

	function getIp() {
    	$ip = $_SERVER['REMOTE_ADDR'];
 
	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
 
    	return $ip;
	}

	function cart(){

		global $con;
		if(isset($_GET['add_cart'])){

			$ip_address = getIp();
			$product_id = $_GET['add_cart'];

			$check_product = "SELECT * FROM cart WHERE IPAddress='$ip_address' AND ProductID='$product_id'";
			$run_check = mysqli_query($con, $check_product);
			if (mysqli_num_rows($run_check) > 0) {
				echo "";
			}

			else{
				$cart_sql = "INSERT INTO cart(ProductID, IPAddress) VALUES ('$product_id', '$ip_address')";
				$cart_query = mysqli_query($con, $cart_sql);
				}
		}
	}

	function checkCart(){

		global $con;
		if(isset($_GET['add_cart'])){

			$ip_address = getIp();

			$check_product = "SELECT * FROM cart WHERE IPAddress='$ip_address'";
			$run_check = mysqli_query($con, $check_product);
			$rows = mysqli_num_rows($run_check);
		}
		else{
			$ip_address = getIp();

			$check_product = "SELECT * FROM cart WHERE IPAddress='$ip_address'";
			$run_check = mysqli_query($con, $check_product);
			$rows = mysqli_num_rows($run_check);
		}

		echo "$rows";
	}

	function cartItems(){
		$total = 0;
		global $con;
		$ip_address = getIp();

		$ip_sql = "SELECT* FROM cart WHERE IPAddress='$ip_address'";
		$ip_query = mysqli_query($con, $ip_sql);

		while($ip_result = mysqli_fetch_array($ip_query)){
			$ip_id = $ip_result['ProductID'];

			$pro_sql = "SELECT * FROM products WHERE ProductID='$ip_id'";
			$pro_query = mysqli_query($con, $pro_sql);

			while ($pro = mysqli_fetch_array($pro_query)) {
				$pro_id = $pro['ProductID'];
				$pro_name = $pro['ProductLongName'];
				$pro_single_price = $pro['ProductOurPrice'];
				$pro_price = array($pro['ProductOurPrice']);
				$pro_image = $pro['ProductImage'];

				$values = array_sum($pro_price);
				$total += $values;
				echo "<tr class='cart_table_items'>
						<td><div class='cart_table_item'><img src='admin-area/images/$pro_image' width='100px'></div></td>
						<td><div class='cart_table_item'>$pro_name</div></td>
						<td><div class='cart_table_item'><input type='number' name='qty' value='1' width='20px' min='0' max='10'></div></td>
						<td><div class='cart_table_item'>&#8377 $pro_single_price</div></td>
						<td><div class='cart_table_item'>FREE</div></td>
						<td><div class='cart_table_item'><input type='submit' name='update_cart' class='cart_table_remove' value='x' /><br> &#8377 $pro_single_price</div></td>
		        	</tr>";
		        if (isset($_POST['update_cart'])) {
		        	$remove_sql = "DELETE FROM cart WHERE IPAddress='ip_address' AND ProductID='$pro_id'";
		        	$remove_query = mysqli_query($con, $remove_sql);
		        }
        	}
        }
        echo "<tr>
				<td colspan='5' class='cart_table_grand_total'> Grand Total : </td>
				<td class='cart_table_grand_total'>&#8377 $total</td>
			</tr>";
	}

	function register(){

		global $con;
		if (isset($_POST['register'])) {
			
			$ip = getIp();

			$user_name = $_POST['UserName'];
			/*$user_name_sql = "SELECT * FROM users WHERE UserID='$user_name";
			$user_name_query = mysqli_query($con, $user_name_sql);
			$user_name_validation = mysqli_num_rows($user_name_query);

			if ($user_name_validation > 0) {
				echo "Username not acceptable!!!";
				exit();
			}*/

			$user_email_id = $_POST['UserEmailID'];
			$user_password = $_POST['UserPassword'];
			$user_verify_password = $_POST['UserVerifyPassword'];

			if ($user_password == $user_verify_password) {
				$user_sql = "INSERT INTO users (UserID, UserIP, UserEmail, UserPassword) VALUES ('$user_name', '$ip', '$user_email_id', '$user_password')";
				$user_query = mysqli_query($con, $user_sql);
			}
			else{
				echo "Passwords don't match!!!";
				exit();
			}

			$check_product = "SELECT * FROM cart WHERE IPAddress='$ip'";
			$run_check = mysqli_query($con, $check_product);
			$rows = mysqli_num_rows($run_check);
			if ($rows == 0) {
				$_SESSION['UserName'] = $user_name;
				echo "<script>window.open('users/myaccount.php','_self')</script>";
			}
			else{
				$_SESSION['UserName'] = $user_name;
				echo "<script>window.open('checkout.php','_self')</script>";
			}
		}
	}

	function loginHeader(){
		if (isset($_SESSION['UserName'])) {
			echo "<button id='logoutButton' class='login_option'>LOGOUT</button>";
		}
		else{
			echo "<button id='loginButton' class='login_option'>LOGIN</button>";
			include 'login_modal.php';
		}
	}

	function login(){

		global $con;
		if (isset($_POST['login'])) {
			
			$ip = getIp();

			$user_name = $_POST['UserName'];
			$user_password = $_POST['UserPassword'];
			$user_sql = "SELECT * FROM users WHERE UserID='$user_name' AND UserPassword='$user_password'";
			$user_query = mysqli_query($con, $user_sql);
			$user_check = mysqli_num_rows($user_query);
			
			if ($user_check == 1) {
				$_SESSION['UserName'] = $user_name;
				echo "<script>alert('Successfully logged in!!!')</script>";				
				echo "<script>window.open('checkout.php','_self')</script>";
			}
			else{
				echo "<script>alert('Invalid User Name or Password')</script>";				
				echo "<script>window.open('login.php','_self')</script>";
				exit();
			}
		}
	}

?>
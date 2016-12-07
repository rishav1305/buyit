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
    <main>
		<?php detailBody(); ?>
    </main>
  </body>
</html>
<?php session_start(); include("functions.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>buYit - Register</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/header_footer.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />
    <link rel="shortcut icon" href="logo.ico">
  <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="login_modal.css">
    <link rel="stylesheet" href="css/modal.css">
  </head>
  <body>
    <?php include('header.php'); ?>
    <main>
      <form class="form" action="register.php" enctype="multipart/form-data" method="post">
        <div>
          <h1>Register</h1>
          <hr>
        </div>
        <div>
          <?php register(); ?>
          <input type="text" class="textbox" placeholder="User Name" name="UserName" autofocus required ><br>
          <input type="email" class="textbox" placeholder="Email Id" name="UserEmailID" required><br>
          <input type="password" class="textbox" placeholder="Password" name="UserPassword" required><br>
          <input type="password" class="textbox" placeholder=" Verify Password" name="UserVerifyPassword" required><br><br>
          <input type="checkbox" name="tnc" required>&nbsp I accept the Terms and Conditions of this website.<br>
          <input type="submit" class="register_button" name="register" value="Register" /><br>
        </div>
      </form>
    </main>
  </body>
</html>
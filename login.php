<?php include("functions.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>buYit - Login</title>
    <link rel="stylesheet" href="css/login.css">
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
      <form class="form" action="login.php" enctype="multipart/form-data" method="post">
        <div>
          <h1>Log In</h1>
          <hr>
        </div>
        <div>
        <?php login(); ?>
          <input type="text" class="textbox" placeholder="Enter your User Name" name="UserName" autofocus><br>
          <input type="password" class="textbox" placeholder="Enter your password" name="UserPassword"><br>
          <button type="submit" class="login_button" name="login">Log In</button><br>
          <a href="#" class="forgot_password">Forgot Password?</a>
        </div>
        <div>
          <hr>
          <h5 class="h5">New User? <a href="register.php" class="register_button">Register</a></h5>
        </div>
      </form>
    </main>
  </body>
</html>
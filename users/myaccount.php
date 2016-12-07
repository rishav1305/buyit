<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>buYit - My Account</title>
    <link rel="stylesheet" href="myaccount.css">
    <link rel="stylesheet" href="header_footer.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />
    <link rel="shortcut icon" href="logo.ico">
  </head>
  <body>
    <?php include('header.php'); ?>
    <main>
      <form class="form" action="register.php" enctype="multipart/form-data" method="post">
        <div>
          <h1>My Account</h1>
          <hr>
        </div>
        <div>
          <div style="float:right" align="center">
            <img src="images/profile.png" width="200px" border="2px"><br>
            <input type="file" name="profile_photo">
          </div>
          <input type="text" class="textbox" placeholder="User Name" name="UserName" autofocus disabled><br>
          <input type="email" class="textbox" placeholder="Email Id" name="UserEmailID" disabled><br>
          <input type="submit" class="register_button" name="register" value="Edit Profile" /><br>
        </div>
      </form>
    </main>
  </body>
</html>
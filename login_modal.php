<div id="loginModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="loginClose">X</span>
      <h2 id="h2">Log In</h2>
    </div>
    <div class="modal-body">
    <form id="form" action="main.php" enctype="multipart/form-data" method="post">
    	<div>
        <?php login(); ?>
  			<input type="text" id="textbox" placeholder="Enter your User Name" name="UserName" autofocus><br>
  			<input type="password" id="textbox" placeholder="Enter your password" name="UserPassword"><br>
  			<button type="submit" id="login_button" name="login">Log In</button><br>
  			<a href="#" id="forgot_password">Forgot Password?</a>
  		</div>
  		<div>
  			<hr>
  			<h5 id="h5">New User?	<a href="register.php" id="register_button">Register</a></h5>
  		</div>
    </form>
    </div>
  </div>

</div>
<script>
  // Get the modal
  var loginModal = document.getElementById('loginModal');

  // Get the button that opens the modal
  var loginButton = document.getElementById("loginButton");

  // Get the <span> element that closes the modal
  var loginSpan = document.getElementsByClassName("loginClose")[0];

  // When the user clicks the button, open the modal
  loginButton.onclick = function() {
    loginModal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  loginSpan.onclick = function() {
    loginModal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == loginModal) {
        loginModal.style.display = "none";
    }
  }
</script>
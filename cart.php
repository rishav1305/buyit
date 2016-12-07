<div id="cartModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <h2 class="h2">Cart</h2>
    </div>
    <div class="modal-body">
    <form id="form" action="" method="post" enctype="multipart/form-data">
      <table class="cart_table">
        <tr class="cart_table_headings">
          <th colspan="2" class=cart_table_heading>ITEM</th>
          <th class=cart_table_heading>QTY</th>
          <th class=cart_table_heading>PRICE</th>
          <th class=cart_table_heading>DELIVERY</th>
          <th class=cart_table_heading>SUB TOTAL</th>
        </tr>
        <tbody style="position:relative; overflow-y:auto"><?php cartItems(); ?></tbody>
      </table>
      <input type="submit" class="cart_table_button" value="Countinue Shopping">
      <button id="checkoutButton" class="cart_table_button"><a href="checkout.php">CHECKOUT</a>
    </form>
    </div>
  </div>

</div>
<script>
  // Get the modal
  var cartModal = document.getElementById('cartModal');

  // Get the button that opens the modal
  var cartButton = document.getElementById("cartButton");

  // Get the <span> element that closes the modal
  var contShop = document.getElementsByClassName("cart_table_button")[0];

  // When the user clicks the button, open the modal
  cartButton.onclick = function() {
    cartModal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  contShop.onclick = function() {
    cartModal.style.display = "none";
  }
</script>

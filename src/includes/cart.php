<div>
  <!-- cart -->
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Cart
  </button>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cart items</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <!-- cart items -->
            <?php
            // get cart items from session
            if (isset($_SESSION['cartItems'])) {
              $cartItems = $_SESSION['cartItems'];
              for ($x = 0; $x < count($cartItems); $x++) {
                $cartItem = $cartItems[$x];
                $productId = $cartItem['productId'];
                $quantity = $cartItem['quantity'];
                // get product name of current productId
                $productOfIdQuery = "SELECT name FROM products WHERE products.id = '$productId';";
                $productOfIdResult = mysqli_query($conn, $productOfIdQuery);
                $productOfIdRow = mysqli_fetch_assoc($productOfIdResult);
                echo '
                  <div class="row">
                    <div class="col-6">
                      <p>Termék: ' . $productOfIdRow['name'] . '</p>
                    </div>
                    <div class="col">
                      <p>' . $quantity . ' db</p>
                    </div>
                    <div class="col">
                      <form action="./session/deleteCartItem.php" method="POST">
                        <input type="text" name="productId" value="' . $productId . '" hidden>
                        <input type="text" name="quantity" value="' . $quantity . '" hidden>
                        <input type="submit" value="Remove" class="btn btn-danger">
                      </form>
                    </div>
                  </div>
              ';
              }
            }
            ?> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
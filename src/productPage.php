<?php
include('./includes/head.php');
include('./includes/db.php');
include('./favorite/getFavorites.php');
?>

<body>
  <?php
  include('./includes/header.php');
  if (isset($_SESSION["userName"])) {
    include('./includes/menu.php');
  }

  if (!isset($_GET['productId'])) {
    echo '<p class="text-danger">Product is not set!</p>';
    exit();
  }
  // get product
  $productId = mysqli_real_escape_string($conn, $_GET['productId']);
  $productsQuery = "SELECT * FROM products WHERE products.id = '$productId';";
  $productsResult = mysqli_query($conn, $productsQuery);
  $product = mysqli_fetch_assoc($productsResult);

  // page view
  echo '
      <main>
        <div class="container border shadow p-2">
          <div class="row">
            <div class="col">
              <h2>'.$product['name'].'</h2>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <p>'.$product['description'].'</p>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <form action="./session/saveCartItem.php" method="POST">
                <div class="row">
                  <div class="col-lg-2 col-4">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" min="1" placeholder="1" class="form-control">
                    <input type="text" name="productId" id="productId" value="'.$product['id'].'" hidden>
                  </div>
                </div>
                <div class="row">
                  <div class="col m-3">
                    <input type="submit" value="Add to Cart" class="btn btn-success">
                  </div>
                </div>
              </form>';
                if (isset($_SESSION["userName"])) {
                  if (isFavorite($conn, $_SESSION["userId"], $product['id'])) {
                    echo '
                    <div class="row">
                      <div class="col-12 m-1">
                        <form action="./favorite/removeFavorite.php" method="POST">
                          <input type="text" name="productId" id="productId" value="' . $product['id'] . '" hidden>
                          <input class="btn btn-danger" type="submit" value="Remove From Favorites">
                        </form>
                      </div>                  
                    </div>
                  ';
                  } else {
                    echo '
                      <div class="row">
                        <div class="col-12 m-1">
                          <form action="./favorite/addFavorite.php" method="POST">
                            <input type="text" name="productId" id="productId" value="' . $product['id'] . '" hidden>
                            <input class="btn btn-info" type="submit" value="Add to Favorites">
                          </form>
                        </div>                  
                      </div>
                    ';
                  }
                }
                echo '
            </div>
          </div>
        </div>
      </main>
  ';

  ?>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
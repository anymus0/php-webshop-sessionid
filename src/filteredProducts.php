<?php
include('./includes/head.php');
include('./includes/db.php');
include('./includes/header.php');
include('./includes/menu.php');
?>

<body>
  <div class="container">
    <div class="row">
      <?php
      $subCategories = $_GET["subCategories"];
      $query = "SELECT * FROM product_category INNER JOIN products ON products.id = product_category.ProductId WHERE subCategoryId IN ('" . implode("','", $subCategories) . "');";
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        echo '
          <div class="col-lg-6 col-12">
            <div class="card m-3 p-3 shadow" style="max-width: 100%;">
            <div class="card-body">
              <h5 class="card-title">' . $row["name"] . '</h5>
              <p class="card-text">' . $row["description"] . '</p>
              <p class="card-text">' . $row["price"] . ' Ft</p>
              <div class="row">
              <div class="col-lg-4 col-12 m-1">
                <form action="./session/saveCartItem.php" method="POST">
                  <label for="quantity">Quantity:</label>
                  <input type="number" name="quantity" id="quantity" min="1" placeholder="1" class="form-control m-1">
                  <input type="text" name="productId" id="productId" value="' . $row['ProductId'] . '" hidden>
                  <input class="btn btn-success" type="submit" value="Add to Cart">
                </form>
              </div>
              <div class="col-lg-4 col-12 m-1">
                <form action="./favorite/addFavorite.php" method="POST">
                  <input type="text" name="productId" id="productId" value="' . $row['ProductId'] . '" hidden>
                  <input class="btn btn-info" type="submit" value="Add to Favorite">
                </form>
              </div>
            </div>
            </div>
          </div>
        </div>
        ';
      } ?>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
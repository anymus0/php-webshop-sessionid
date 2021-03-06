<?php
include 'db.php';
?>
<section>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- categories -->
          <?php
          // get categories
          $categoriesQuery = "SELECT * FROM categories WHERE 1;";
          $categoriesResult = mysqli_query($conn, $categoriesQuery);
          while ($category = mysqli_fetch_assoc($categoriesResult)) {
            echo '
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                ' . $category['name'] . '
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <!-- products -->';
            // get products
            $categoryId = $category['id'];
            $productsQuery = "SELECT * FROM products WHERE products.categoryId = '$categoryId';";
            $productsResult = mysqli_query($conn, $productsQuery);
            while ($product = mysqli_fetch_assoc($productsResult)) {
              echo '
                <li><a class="dropdown-item" href="productPage.php?productId=' . $product['id'] . '">' . $product['name'] . '</a></li>
                ';
            }
            echo '
              </ul>
            </li>
            ';
          }
          ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Detailed search
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <div class="container">
                <div class="row">
                  <div class="col">
                    <form action="./filteredProducts.php" method="GET">
                      <?php
                      // sub-categories
                      $subCategoriesQuery = "SELECT * FROM subcategories;";
                      $subCategoriesResult = mysqli_query($conn, $subCategoriesQuery);
                      while ($subCategoryRow = mysqli_fetch_assoc($subCategoriesResult)) {
                        echo '
                        <input type="checkbox" id="subCategory-' . $subCategoryRow["name"] . '" name="subCategories[]" value="' . $subCategoryRow["id"] . '">
                        <label for="subCategory-' . $subCategoryRow["name"] . '">' . $subCategoryRow["name"] . '</label><br>';
                      }
                      ?>
                      <input class="btn btn-success m-2" type="submit" value="Apply">
                    </form>
                  </div>
                </div>
              </div>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="./favoritesPage.php" role="button">
              Favorites
            </a>
          </li>
        </ul>
        <div class="d-flex">
          <?php
          include 'cart.php';
          ?>
        </div>
      </div>
    </div>
  </nav>
</section>
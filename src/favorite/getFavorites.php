<?php

function getFavorites($conn, $userId) {
  $favoriteQuery = "SELECT * FROM favorites WHERE favorites.userId = '$userId';";
  $favoritesResult = mysqli_query($conn, $favoriteQuery);
  return $favoritesResult;
}

function isFavorite($conn, $userId, $productId) {
  $isFavorite = false;
  $favoritesResult = getFavorites($conn, $userId);
  while ($favoriteRow = mysqli_fetch_assoc($favoritesResult)) {
    if ($favoriteRow["ProductId"] == $productId) {
      $isFavorite = true;
      break;
    }
  }
  return $isFavorite;
}
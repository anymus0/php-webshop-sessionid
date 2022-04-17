<?php
include('./../includes/db.php');
session_start();

if (!isset($_POST["productId"]) || $_POST["productId"] == "") {
  header('Location: ./../index.php?error=missingVariable');
  exit();
}

$productId = mysqli_real_escape_string($conn, $_POST["productId"]);
$userId = $_SESSION["userId"];


$favoriteQuery = "INSERT INTO `favorites`(`ProductId`, `userId`) VALUES ('$productId', '$userId');";
$favoritesResult = mysqli_query($conn, $favoriteQuery);

header('Location: ./../productPage.php?productId='.$productId.'');
exit();
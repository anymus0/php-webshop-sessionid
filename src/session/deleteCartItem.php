<?php
include './../includes/db.php';
session_start();

if ($_POST['productId'] == "" || $_POST['quantity'] == "") {
  header('location: ./../index.php?deleteItem=failure');
  exit();
}

$productId = mysqli_real_escape_string($conn, $_POST['productId']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$sessionId = session_id();

$query = "DELETE FROM cartitems WHERE cartitems.productId = '$productId'
AND cartitems.quantity = '$quantity' AND cartitems.sessionId = '$sessionId' LIMIT 1;";
$queryResult = mysqli_query($conn, $query);


if ($queryResult) {
  // save to session
  $currentCart = $_SESSION['cartItems'];
  for ($i=0; $i < count($currentCart); $i++) { 
    $cartItem = $currentCart[$i];
    if ($cartItem['productId'] == $productId && $cartItem['quantity'] == $quantity) {
      unset($currentCart[$i]);
      break;
    }
  }
  $_SESSION['cartItems'] = array_values($currentCart);
  header('location: ./../index.php?deleteItem=success');
  exit();
} else {
  header('location: ./../index.php?deleteItem=failure');
  exit();
}
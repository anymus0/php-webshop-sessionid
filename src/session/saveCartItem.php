<?php
include './../includes/db.php';
session_start();

try {
  if ($_POST['productId'] == "" || $_POST['quantity'] == "" && isset($_SESSION['userName'])) {
    throw new Exception('missing variable');
  }

  $productId = mysqli_real_escape_string($conn, $_POST['productId']);
  $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
  $sessionId = session_id();

  $query = "INSERT INTO cartitems(productId, quantity, sessionId) VALUES ('$productId', '$quantity', '$sessionId')";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    throw new Exception('Error! Could not insert item into DB!');
  }
  // save to session
  if (isset($_SESSION['cartItems'])) {
    $currentCart = $_SESSION['cartItems'];
    $currentCart[] = array("productId"=>$productId, "quantity"=>$quantity,);
    $_SESSION['cartItems'] = $currentCart;
  }
  else {
    $_SESSION['cartItems'] = array(array("productId"=>$productId, "quantity"=>$quantity));
  }
  header('location: ./../index.php?addedItem=success');

} catch (Exception $err) {
  echo '<p>' . $err . '</p>';
  exit();
}

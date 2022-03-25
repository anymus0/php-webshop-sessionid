<?php
function initSession($loggedInUser, $conn)
{
  // check if user has a session in DB
  $query = "SELECT users.sessionId FROM users WHERE users.userName = '$loggedInUser';";
  $queryResult = mysqli_query($conn, $query);
  $userRow = mysqli_fetch_assoc($queryResult);
  
  if (!isset($userRow['sessionId']) || $userRow['sessionId'] == "") {
    // create new session instance in DB
    $sessionId = session_id();
    $newSessionInstanceQuery = "INSERT INTO usersessions(id) VALUES ('$sessionId');";
    $newSessionInstanceResult = mysqli_query($conn, $newSessionInstanceQuery);

    $saveNewSessionIdQuery = "UPDATE users SET sessionId='$sessionId';";
    $newSessionIdResult = mysqli_query($conn, $saveNewSessionIdQuery);
  } else {
    // load stored session data
    $sessionId = $userRow['sessionId'];
    session_id($sessionId);
    session_start();
    $cartItems = array();
    $sessionDataQuery = "SELECT productId, quantity FROM cartitems WHERE cartitems.sessionId = '$sessionId';";
    $sessionDataResult = mysqli_query($conn, $sessionDataQuery);
    while ($sessionDataRow = mysqli_fetch_assoc($sessionDataResult)) {
      $cartItems[] = $sessionDataRow;
    }
    $_SESSION['cartItems'] = $cartItems;
  }
}

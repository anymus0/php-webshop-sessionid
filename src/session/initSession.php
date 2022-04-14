<?php
function initSession($loggedInUser, $conn)
{
  // check if user has a session in DB
  $query = "SELECT users.sessionId FROM users WHERE users.userName = '$loggedInUser';";
  $queryResult = mysqli_query($conn, $query);
  $userRow = mysqli_fetch_assoc($queryResult);

  if ($userRow['sessionId'] == 0) {
    // create new session instance in DB
    session_regenerate_id(true);
    session_start();
    $sessionId = session_id();
    $newSessionInstanceQuery = "INSERT INTO usersessions(id) VALUES ('$sessionId');";
    $newSessionInstanceResult = mysqli_query($conn, $newSessionInstanceQuery);

    $saveNewSessionIdQuery = "UPDATE users SET sessionId='$sessionId' WHERE users.userName = '$loggedInUser';";
    $newSessionIdResult = mysqli_query($conn, $saveNewSessionIdQuery);
  } else if ($userRow['sessionId'] != 0 && $userRow['sessionId'] != "") {
    // load stored session data
    $sessionId = $userRow['sessionId'];
    session_id($sessionId);
    
    $cartItems = array();
    $sessionDataQuery = "SELECT productId, quantity FROM cartitems WHERE cartitems.sessionId = '$sessionId';";
    $sessionDataResult = mysqli_query($conn, $sessionDataQuery);
    while ($sessionDataRow = mysqli_fetch_assoc($sessionDataResult)) {
      $cartItems[] = $sessionDataRow;
    }
    session_start();
    $_SESSION['cartItems'] = $cartItems;
  }
}

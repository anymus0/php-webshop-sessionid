<?php
include './../includes/db.php';

// input process
$userName = mysqli_real_escape_string($conn, $_POST['userName']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
if ($userName == "" || $password == "") {
  header('location: ./../index.php?error=missingVariables');
  exit();
}
$userQuery = "SELECT * FROM users WHERE users.userName = '$userName';";
$userQueryResult = mysqli_query($conn, $userQuery);

if (mysqli_num_rows($userQueryResult) == 0) {
  header('location: ./../index.php?error=userNotFound');
  exit();
}

if (mysqli_num_rows($userQueryResult) != 1) {
  header('location: ./../index.php?error=userQueryError');
  exit();
}

$user = mysqli_fetch_assoc($userQueryResult);
if ($user['passwordHash'] != md5($password)) {
  header('location: ./../index.php?error=wrongPassword');
  exit();
}

// set userName cookie
if (isset($_POST['rememberUserName'])) {
  setcookie('userName', $user['userName'], time() + (86400 * 30), '/');
} else {
  // remove cookie
  setcookie('userName', '', 1, '/');
}

include './../session/initSession.php';
initSession($user['userName'], $conn);
session_start();
$_SESSION['userName'] = $user['userName'];

header('location: ./../index.php?loginSuccess=true');
exit();
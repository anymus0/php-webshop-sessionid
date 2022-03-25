<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <?php
          // nav links available only for logged-in users
          if (isset($_SESSION['userName'])) {
            echo '
              <li class="nav-item">
                <a class="nav-link text-info" href="#">Test page</a>
              </li>
              ';
          }
          ?>
        </ul>
        <?php
        // remember userName
        if (isset($_COOKIE['userName'])) {
          $userNameFromCookie = $_COOKIE['userName'];
          $checkRemember = true;
        } else {
          $userNameFromCookie = "";
          $checkRemember = false;
        }
        if (!isset($_SESSION['userName'])) {
          echo '
          <form class="d-sm-flex" action="./user/login.php" method="POST">
            <p class="w-100 text-warning">remember user name?</p>';
          if ($checkRemember == true) {
            echo '<input type="checkbox" name="rememberUserName" id="rememberUserName" class="me-2 mt-2" checked>';
          } else {
            echo '<input type="checkbox" name="rememberUserName" id="rememberUserName" class="me-2 mt-2">';
          }
          echo '<input class="form-control me-2 text-warning border-warning" type="text" placeholder="userName" aria-label="userName" name="userName" id="userName"
              value="' . $userNameFromCookie . '"
            >
            <input class="form-control me-2" type="password" placeholder="password" aria-label="password" name="password" id="password">
            <input class="btn btn-success" type="submit" value="LogIn">
          </form>
          ';
        } else {
          echo '
          <p class="me-5">Logged in as: <span class="text-info">' . $_SESSION['userName'] . '</span></p>
          <form action="./user/logout.php" method="POST">
            <input class="btn btn-danger" type="submit" value="LogOut">
          </form>
          ';
        }
        ?>
      </div>
    </div>
  </nav>
</header>
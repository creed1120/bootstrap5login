<?php
session_start();
// var_dump($_SESSION);
// die();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Web Applications</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/sitespringmedia2.png" />

    <link rel="stylesheet" href="dist/css/app.css">
    <link rel="stylesheet" href="/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <script src="dist/js/app.js"></script>
</head>
<body id="wrapper">

<?php if ( !isset($_SESSION["account"]) ) : ?>

  <nav class="navbar fixed-top navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="home_page.php"><img src="assets/images/sitespringmedia2.png" height="40" height="auto" alt="Site Logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="home_page.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">Our Story</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">Contact</a>
          </li>
        </ul>
          <div class="login-links">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
              <li class="nav-item"><a class="nav-link" href="/login.php"><i class="bi bi-door-open me-2"></i>Login</a></li>
              <li class="nav-item"><a class="nav-link" href="/sign_up.php"><i class="bi bi-person me-2"></i>Sign-Up</a></li>
            </ul>
          </div>
      </div>
    </div>
  </nav>

<?php  else : ?>

  <nav class="navbar fixed-top navbar-expand-lg bg-light">
      <div class="container">
        <a class="navbar-brand" href="home_page.php"><img src="assets/images/sitespringmedia2.png" height="40" height="auto" alt="Site Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="home_page.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/">Our Story</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/">Contact</a>
            </li>
          </ul>
          <div class="dropdown">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo isset($_SESSION["account"]) ? $_SESSION["account"] : '' ?>
              </button>
              <ul class="dropdown-menu">
                <div class="dropdown-holder d-flex flex-column justify-content-center p-3">
                    <li><a class="dropdown-item inline-flex align-items-center" href="/app.php"><i class="bi bi-person me-2"></i>My Account</a></li>
                    <li><a class="dropdown-item inline-flex align-items-center" href="/settings.php"><i class="bi bi-sliders2 me-2"></i>Settings</a></li>
                    <li><a class="dropdown-item inline-flex align-items-center" href="/user_add.php"><i class="bi bi-person-plus me-2"></i>Add User</a></li>
                    <li><a class="dropdown-item inline-flex align-items-center" href="/index.php"><i class="bi bi-person-video2 me-2"></i>View Users</a></li>
                    <li class="mt-3"><a class="w-100 btn btn-warning" type="submit" href="/logout.php"><i class="bi bi-box-arrow-left me-2"></i>Logout</a></li>
                </div>
              </ul>
          </div>
      </div>
    </div>
  </nav>

<?php  endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dist/css/bootstrap.css">
</head>
<body>
<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <img src="img/logo.png" class="logo">

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="mainPage.php" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="about.php" class="nav-link px-2 text-white">About</a></li>
          <li><a href="Archive.php" class="nav-link px-2 text-white">Archive</a></li>
          <li><a href="AddMedia.php" class="nav-link px-2 text-white">Add media</a></li>
          <li><a href="editPage.php" class="nav-link px-2 text-white">edit</a></li>
        </ul>
        <div class="text-end d-flex">
          <?php
          if($_COOKIE['isAuth'] = 1):
          ?>
          <h1>Welcome<h1>
          <?php endif; 
          if($_COOKIE['isAuth'] = 0):?>
          <form action="index.php" class="text-end">
            <button type="submit" class="btn btn-outline-light me-2">Login</button>
          </form>
          <form action="regestretion.php">
            <button type="submit" class="btn btn-warning">Sign-up</button>
          </form>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </header>
</body>
</html>
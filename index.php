<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="dist/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<main class="mx-5-1">
  <div class="mx-5-1">
    <form action="authScript.php" method="post">
      <img class=" mt-5 logo" src="img/logo.png" alt="" width="1024" height="1024">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating mb-4">
        <input type="text" class="form-control" id="floatingInput" placeholder="topNuginbator3000" name="login">
        <label for="floatingInput">Login</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
      </div>
      <div class="form-check text-start my-3">
        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Remember me
        </label>
      </div>
      <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button></br>
      <a calss="regLink" href="regestretion.php">Registration</a>
      <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
    </form>
  </div>
</main>
</body>
</html>
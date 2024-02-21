<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="dist/css/bootstrap.css" rel="stylesheet">
</head>
<main class="mx-5-1">
    <body>
        <div class="mx-5-1">
            <form action="familyRegScript.php" method="post">
                <img class=" mt-5 logo" src="img/logo.png" alt="" width="1024" height="1024">
                <h1 class="h3 mb-3 fw-normal">Нам не удалось найти архив семьи с такой фамилией, <br/>
                пожалуйста введите вашу фамилию чтобы мы могли </br>привязать вас к нужному архиву.</h1>
                <div class="form-floating">
                    <input type="text" class="form-control" id="Family" name="Family">
                    <label for="Family">Family</label>
                </div> <br>
                <button class="btn btn-primary w-100 py-2" type="submit">Reginstration</button></br>
                <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
                </div>
        </div>
    </form>
</main>
</body>
</html>
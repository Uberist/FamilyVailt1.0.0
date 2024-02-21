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
            <form action="regScript.php" method="post">
                <img class=" mt-5 logo" src="img/logo.png" alt="" width="1024" height="1024">
                <h1 class="h3 mb-3 fw-normal">Registration</h1>
                    <?php
                        if($_COOKIE['login'] != null)
                            echo'<p class=" text-break text-left mt-2">'.str_replace('&', ' ', $_COOKIE['login']).'</p>';
                    ?>
                <div class="form-floating">
                    <input type="text" class="form-control" id="login" placeholder="topNugibator3000" name="login">
                    <label for="login">Login</label>
                </div> <br>
                    <?php
                        if($_COOKIE['email'] != null)
                            echo'<p class=" text-break text-left mt-2">'.str_replace('&', ' ', $_COOKIE['email']).'</p>';
                    ?>
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                    <label for="floatingInput">Email address</label>
                </div><br>
                    <?php
                        if($_COOKIE['displayName'] != null)
                            echo'<p class=" text-break text-left mt-2">'.str_replace('&', ' ', $_COOKIE['displayName']).'</p>';
                    ?>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="anyName" name="displayName">
                    <label for="floatingInput">Display name</label>
                </div><br>
                    <?php
                        if($_COOKIE['password'] != null)
                            echo'<p class=" text-break text-left mt-2">'.str_replace('&', ' ', $_COOKIE['password']).'</p>';
                    ?>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                </div><br>
                    <?php
                        if($_COOKIE['passwordAgain'] != null)
                            echo'<p class=" text-break text-left mt-2">'.str_replace('&', ' ', $_COOKIE['passwordAgain']).'</p>';
                    ?>
                <div class="form-floating">
                    <input type="password" class="form-control" id="PasswordAgain" placeholder="Password" name="passwordAgain">
                    <label for="PasswordAgain">Password again</label>
                </div><br>
                    <?php
                        if($_COOKIE['FirstName'] != null)
                            echo'<p class=" text-break text-left mt-2">'.str_replace('&', ' ', $_COOKIE['FirstName']).'</p>';
                    ?>
                <div class="form-floating">
                    <input type="Text" class="form-control" id="FirstName" placeholder="Text" name="FirstName">
                    <label for="FirstName">First name</label>
                </div><br>
                    <?php
                        if($_COOKIE['LastName'] != null)
                            echo'<p class=" text-break text-left mt-2">'.str_replace('&', ' ', $_COOKIE['LastName']).'</p>';
                    ?>
                <div class="form-floating">
                    <input type="Text" class="form-control" id="LastName" placeholder="Text" name="LastName">
                    <label for="LastName">Last name</label>
                </div><br>
                    <?php
                        if($_COOKIE['FatherName'] != null)
                            echo'<p class=" text-break text-left mt-2">'.str_replace('&', ' ', $_COOKIE['FatherName']).'</p>';
                    ?>
                <div class="form-floating">
                    <input type="Text" class="form-control" id="FatherName" placeholder="Text" name="FatherName">
                    <label for="FatherName">FatherName</label>
                </div><br>
                    <?php
                        if($_COOKIE['Family'] != null)
                            echo'<p class=" text-break text-left mt-2">'.str_replace('&', ' ', $_COOKIE['Family']).'</p>';
                    ?>
                <div class="form-floating">
                    <input type="text" class="form-control" id="Family" placeholder="Text" name="Family">
                    <label for="Family">Family</label>
                </div> <br>
                    <?php
                        if($_COOKIE['bithday'] != null)
                            echo'<p class=" text-break text-left mt-2">'.str_replace('&', ' ', $_COOKIE['bithday']).'</p>';
                    ?>
                <div class="form-floating Cell-1">
                    <p class=" text-break text-left mt-2">Дата рождения</p>
                    <input type="date" class="form-control-1 mt-1" id="floatingInput" placeholder="Дата рождения" name="bithday">
                </div><br>
                    <?php
                        if($_COOKIE['newMember'] != null)
                            echo'<p class=" text-break text-left mt-2">'.str_replace('&', ' ', $_COOKIE['newMember']).'</p>';
                    ?>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="true" id="flexCheckDefault" name="newMember">
                    <label class="form-check-label" for="flexCheckDefault">Меня нет на фото</label>
                </div>
                    <?php
                        if($_COOKIE['newFamily'] != null)
                            echo'<p class=" text-break text-left mt-2">'.str_replace('&', ' ', $_COOKIE['newFamily']).'</p>';
                    ?>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="true" id="flexCheckDefault" name="newFamily">
                    <label class="form-check-label" for="flexCheckDefault">Создать новый семейный архив</label>
                </div>
                
                <!-- <select class="form-select" aria-label="Which family member are you?" name="memberID">
                    <?php
                        // require "DBconnection.php";
                        // $query = "
                        // select familyMembers.memberID, firstName, lastName, fatherName, userID
                        // from familyMembers
                        // left join users on users.memberID = familyMembers.memberID
                        // where (lastName = 'Федосеев' or lastName = 'Федосеева') 
                        // and isLive = true and isnull(userID);
                        // ";
                        // $result = mysqli_query($connection->getConnection(), $query);  
                        // while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                        // {
                        //     $memberName = $row["firstName"]." ".$row["lastName"]." ".$row["fatherName"];
                        //     echo" <option value=".$row["memberID"].">".$memberName."</option>" ;
                        // }
                    ?>
                </select><br> -->
                <button class="btn btn-primary w-100 py-2" type="submit">Reginstration</button></br>
                <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
                </div>
        </div>
    </form>
</main>
</body>
</html>
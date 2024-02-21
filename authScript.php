<?php
    require "DBconnection.php";
    $login = md5($_POST['login']);
    $password = md5($_POST['password']);
    $query = "
    select userID 
    from users 
    where login = '".$login."' and password = '".$password."';";
    $result = mysqli_query($connection->getConnection(), $query);
    if($result->num_rows > 0)
    {
        $query = "
        insert into loginhistory 
        (id, dateLogin, userId, agent)  
        values(null, '".date("Y-m-d H:i:s")."', (select userID from users where login = '".$login."' limit 1), '".$_SERVER['HTTP_USER_AGENT']."');";
        var_dump($query);
        mysqli_query($connection->getConnection(), $query);
        setcookie("isAuth", "true");
        setcookie("login", $login);
        header("location: mainPage.php");
    } else {
    }

?>
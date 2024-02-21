<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive</title>
</head>
<body>
    <?php require "navbar.php"; ?>
    <div class="d-flex flex-row my-5">
        <div class="ml-2-1 panel text-bg-dark rounded">
            <p class="pt-4 text-break text-center">Выберите, что должно находиться в файлах</p>
                <div class="mx-1 py-3">
                    <form action="queryScript.php" method="POST">
                        <div class="d-flex flex-row mx-4">
                            <div class="People mx-2 Cell">
                                <h1 class="fs-5">Люди на фото:</h1>
                                    <?php 
                                    require "DBconnection.php";
                                    $query = '
                                    select memberID, firstName, lastName, fatherName
                                    from familyMembers;';
                                    $MemberName = '';
                                    $MemberID;
                                    $result = mysqli_query($connection->getConnection(), $query);
                                    $row;
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $MemberName = $row['firstName'].' '.$row['lastName'].' '.$row['fatherName'];
                                        $memberID = $row['memberID'];
                                        echo '<div class="form-check">';
                                        echo '<input class="form-check-input" type="checkbox" value="'.$memberID.'" id="flexCheckDefault" name="numberPerson:'.(string)$i.'">';
                                        echo '<label class="form-check-label" for="flexCheckDefault">';
                                        echo $MemberName;
                                        echo '</label>';
                                        echo '</div>';
                                        $i++;
                                    }
                                ?>
                            </div>
                            <div class="Events mx-2 Cell">
                                <h1 class="fs-5">События:</h1>
                                    <?php 
                                    $query="
                                    select eventID, name 
                                    from events;";
                                    $EventName;
                                    $EventID;
                                    $result = mysqli_query($connection->getConnection(), $query);
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($result)){
                                        $EventName = $row["name"];
                                        $EventID = $row["eventID"];
                                        echo '<div class="form-check">';
                                        echo '<input class="form-check-input" type="checkbox" value="'.$EventID.'" id="flexCheckDefault" name="numberEvent:'.(string)$i.'">';
                                        echo '<label class="form-check-label" for="flexCheckDefault">';
                                        echo $EventName;
                                        echo '</label>';
                                        echo '</div>';
                                        $i++;
                                    }
                                    ?>
                            </div>
                        </div>
                        <div class="d-flex flex-row mx-4">
                            <div class="Type mx-2 Cell">
                                <h1 class="fs-5">Тип файла</h1>
                                    <?php 
                                    $query="
                                    select mediaType 
                                    from media
                                    group by mediaType;";
                                    $mediaType;
                                    $result = mysqli_query($connection->getConnection(), $query);
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($result)){
                                        $mediaType = $row["mediaType"];
                                        echo '<div class="form-check">';
                                        echo '<input class="form-check-input" type="checkbox" value="'.$mediaType.'" id="flexCheckDefault" name="numberMediaType:'.(string)$i.'">';
                                        echo '<label class="form-check-label" for="flexCheckDefault">';
                                        echo $mediaType;
                                        echo '</label>';
                                        echo '</div>';
                                        $i++;
                                    }
                                    ?>
                            </div>
                            <div class="AddedUser mx-2 Cell">
                                <h1 class="fs-5">Пользователь:</h1>
                                    <?php
                                    $query= '
                                    select AddedUser, displayName
                                    from media
                                    join users on users.userID = media.addedUser
                                    group by addeduser;';
                                    $result = mysqli_query($connection->getConnection(), $query);
                                    $usersDisplayName;
                                    $userID;
                                    $i = 0;
                                    while($row = mysqli_fetch_assoc($result)){
                                        $usersDisplayName = $row["displayName"];
                                        $userID = $row["AddedUser"];
                                        echo '<div class="form-check">';
                                        echo '<input class="form-check-input" type="checkbox" value="'.$userID.'" id="flexCheckDefault" name="numberAddedUser:'.(string)$i.'">';
                                        echo '<label class="form-check-label" for="flexCheckDefault">';
                                        echo $usersDisplayName;
                                        echo '</label>';
                                        echo '</div>';
                                        $i++;
                                    }
                                    ?>
                            </div>
                        </div>
                        <div class="DateFilming d-flex flex-row mx-4 my-4">
                                <div class="form-floating Cell-1">
                                    <h1 class="fs-5">Дата сьемки:</h1>
                                    <div class="d-flex fles-row">
                                        <p class=" text-break text-left mt-2">От:</p>
                                        <input type="date" class="form-control-1 mt-1" id="floatingInput" placeholder="От:" name="outDateFilming">
                                    </div>
                                </div><br>
                                <div class="form-floating Cell-1">
                                    <div class="d-flex fles-row mt-4-1">
                                        <p class=" text-break text-left mt-2">До:</p>
                                        <input type="date" class="form-control-1 mt-1" id="floatingInput" placeholder="До:" name="ToDateFilming">
                                    </div>
                                </div><br>
                        </div>
                        <div class="DateFilming d-flex flex-row mx-4 my-4">
                                <div class="form-floating Cell-1">
                                    <h1 class="fs-5">Дата загрузки:</h1>
                                    <div class="d-flex fles-row">
                                        <p class=" text-break text-left mt-2">От:</p>
                                        <input type="date" class="form-control-1 mt-1" id="floatingInput" placeholder="От:" name="outDateLoading">
                                    </div>
                                </div><br>
                                <div class="form-floating Cell-1">
                                    <div class="d-flex fles-row mt-4-1">
                                        <p class=" text-break text-left mt-2">До:</p>
                                        <input type="date" class="form-control-1 mt-1" id="floatingInput" placeholder="До:" name="toDateLoading">
                                    </div>
                                </div><br>
                        </div>
                        <div class="form-check Cell mx-4">
                            <input class="form-check-input" type="checkbox" value="true" id="flexCheckDefault" checked name="filtr">
                            <label class="form-check-label" for="flexCheckDefault">
                                Фильтр
                            </label>
                        </div>
                        <div class="">
                            <div class="mr-5-1 ml-5-1 mb-3 mt-4">
                                <button type="submit" class="btn btn-light btnIDone">Получить</button>
                            </div>
                            <div class="mr-5-1 ml-5-1 md-3 mt-4">
                                    <input type="hidden" value="true" id="flexCheckDefault" name="showMe">
                                    <button type="submit" class="btn btn-light btnIDone">Показать меня</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    <div class="container listPhotos mr-2-1 ml-2-1">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
        // require 'queryScript.php';
        // $arrayMedia = $addMedia->getMedia();
        // if (count($arrayMedia) > 0)
        //     for( $i = 0; $i < count($arrayMedia); $i++):
        // Проверяем, что запрос был методом POST

        ?>
        <div class="col">
            <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                <div class="card-body">
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        <small class="text-body-secondary">9 mins</small>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    <?php require "footer.php"; ?>
</body>
</html>
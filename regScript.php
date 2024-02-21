<?php
    include("Field.php");
    include("DBconnection.php");
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    $arrayField = [
        new Field('login', $_POST['login'], null), new Field('email', $_POST['email'], null), new Field('displayName', $_POST['displayName'], null), 
        new Field('password', $_POST['password'], null), new Field('passwordAgain', $_POST['passwordAgain'], null), new Field('FirstName', $_POST['FirstName'], null),
        new Field('LastName', $_POST['LastName'], null), new Field('FatherName', $_POST['FatherName'], null), new Field('Family', $_POST['Family'], null),
        new Field('bithday', $_POST['bithday'], null), new Field('isNewMember', $_POST['newMember'], null), new Field('newFamily', $_POST['newFamily'], null)
    ];
    for($i = 0; $i < 10; $i++){
        if($arrayField[$i]->isEmpty($arrayField[$i]->getValue()))
            $arrayField[$i]->addErorr('Поле ('.$arrayField[$i]->getName().') пустое.');
    }
    // var_dump($arrayField,'</br>');
    if($arrayField[3]->getValue() != $arrayField[4]->getValue())
        $arrayField[4]->addErorr('Пароли не совпадают');
    mysqli_query($connection->getConnection(), 'select userID from users where displayName = "'.$arrayField[2]->getValue().'";')->num_rows > 0 ? 
    $arrayField[2]->addErorr('Этот никнейм занят') : true;
    mysqli_query($connection->getConnection(), 'select userID from users where email = "'.$arrayField[1]->getValue().'";')->num_rows > 0 ?
    $arrayField[1]->addErorr('Этот email занят.') : true;
    mysqli_query($connection->getConnection(), 'select userID from users where login = "'.md5($arrayField[0]->getValue()).'";')->num_rows > 0 ? 
    $arrayField[0]->addErorr('Этот login занят') : true;
    var_dump(mysqli_query($connection->getConnection(), 'select userID from users where displayName = "'.$arrayField[2]->getValue().'";')->num_rows, 'result');
    var_dump('select userID from users where displayName = "'.$arrayField[2]->getValue().'";');
    var_dump('select userID from users where email = "'.$arrayField[1]->getValue().'";');
    var_dump('select userID from users where login = "'.md5($arrayField[0]->getValue()).'";');
    // var_dump($arrayField[10]->getValue(), 'fffff');
    if($arrayField[10]->getValue() != 'true'){
        if(mysqli_fetch_array(mysqli_query($connection->getConnection(), 'select memberID firstName from familymembers where firstName = "'.$arrayField[5]->getValue().'" and 
        lastName = "'.$arrayField[6]->getValue().'" and FatherName = "'.$arrayField[7]->getValue().'";')) == null){
            $arrayField[5]->addErorr('Человек с таким именем не найден на фотографиях.');
            $arrayField[6]->addErorr('Человек с такой фамилией не найден на фотографиях.');
            $arrayField[7]->addErorr('Человек с таким отчеством не найден на фотографиях.');
        }
    }
    if($arrayField[11]->getValue() != 'true'){
        if(mysqli_fetch_array(mysqli_query($connection->getConnection(), 'select familyID familyName from familes where familyName = "'.$arrayField[8]->getValue().'";')) == null)
            $arrayField[8]->addErorr('Архива этой семьи не существует');
    }
    foreach($arrayField as $obj){
        var_dump($obj->getError(),'</br>');
    }
    $isErrors;
    foreach($arrayField as $obj){
        if($obj->getError() == null){
            $isErrors = false;
        }else{
            $isErrors = true;
            break;
        }
    }
    if($isErrors == false){
        // var_dump('allOkey');
        if ($arrayField[11]->getValue() == 'true'){
            $queryNewFamily = '
            insert into familes values(
            null, "'.$arrayField[8]->getValue().'");';
            mysqli_query($connection->getConnection(), $queryNewFamily);
            // var_dump($queryNewFamily);
        }
        $familyID = mysqli_fetch_array(mysqli_query($connection->getConnection(), 'select familyID from familes where familyName = "'.$arrayField[8]->getValue().'";'))['familyID'];
        if($arrayField[10]->getValue() == 'true'){
            $queryNewMember = '
            insert into familyMembers values(
            null, "'.$arrayField[5]->getValue().'", "'.$arrayField[6]->getValue().'", "'.$arrayField[7]->getValue().'", "'.$arrayField[9]->getValue().'", null, "son", true, '.$familyID.');';
            mysqli_query($connection->getConnection(), $queryNewMember);
            // var_dump($queryNewMember);
            }
        $memberID = mysqli_fetch_array(mysqli_query($connection->getConnection(), 'select memberID from familyMembers where firstName = "'.$arrayField[5]->getValue().'"'
        .' and lastName = "'.
        $arrayField[6]->getValue().
        '" and fatherName = "'.$arrayField[7]->getValue().'";'))['memberID'];
        $queryNewUser = '
        insert into users values(
        null, "'.md5($arrayField[0]->getValue()).'", "'.md5($arrayField[3]->getValue()).'", '.$memberID.', '.$familyID.', "'.$arrayField[2]->getValue().'", "'.$arrayField[1]->getValue().'");';
        var_dump($queryNewUser);
        $result = mysqli_query($connection->getConnection(), $queryNewUser);
        // $result ? var_dump('okey') : var_dump('not okey');
        //header('location:regestretion.php');
    } else {
        $arrayErorr = [];
        foreach($arrayField as $obj){
            $stepStr = '';
            for($i = 0; $i < count($obj->getError()); $i++){
                $stepStr = $stepStr.$obj->getError()[$i].'&';
            }
            var_dump($stepStr, '</br>');
            $arrayErorr[$obj->getName()] = $stepStr;
        }
        var_dump($arrayErorr);  
        foreach($arrayField as $obj){
            setcookie($obj->getName(), $arrayErorr[$obj->getName()]);
        }
        header('location:regestretion.php');
    }
        
    
?>
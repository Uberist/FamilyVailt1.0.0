<?php
        require_once "classAddStr.php";
        require_once "classMedia.php";
        require_once "DBconnection.php";
        error_reporting(E_ALL ^ E_WARNING);
        class QueryScript{
            private $outDateFilming;
            private $ToDateFilming;
            private $outDateLoading;
            private $ToDateLoading;
            private $keys;
            private $timeArray;
            private $arrayKeySup;
            private $queryPartOne;
            private $filtr;
            private $showMe;
            private $arrayObj;
            private $arrayParam;
            private $numberPerson;
            private $numberEvent;
            private $numberMediaType;
            private $numberAddedUser;
            public function __construct(){
                $this->keys = array_keys($_POST);
                $this->outDateFilming = isset($_POST['outDateFilming']) ? $_POST['outDateFilming'] : null;
                $this->ToDateFilming = isset($_POST['ToDateFilming']) ? $_POST['ToDateFilming'] : null;
                $this->outDateLoading = isset($_POST['outDateLoading']) ? $_POST['outDateLoading'] : null;
                $this->ToDateLoading = isset($_POST['toDateLoading']) ? $_POST['toDateLoading'] : null;
                $this->filtr = isset($_POST['filtr']) ? $_POST['filtr'] : null;
                $this->showMe = isset($_POST['showMe']) ? $_POST['showMe'] : null;
                $this->timeArray = [
                    $this->outDateFilming, $this->ToDateFilming, $this->outDateLoading, $this->ToDateLoading
                ];
                $this->arrayKeySup = [
                    'numberPerson:', 'numberEvent:', 'numberMediaType:', 'numberAddedUser:'
                ];
                $this->arrayParam = [
                    $this->numberPerson = [], $this->numberEvent = [], $this->numberMediaType = [], $this->numberAddedUser = []
               ];
                $this->queryPartOne = '
                select mediaID, media.eventID, events.name, caption, 
                dateFilming, uploaddate, mediaType, pathmedia, 
                addeduser, users.displayName, ispersonal
                from media 
                left join events on events.eventID = media.eventID 
                join users on users.userID = media.addeduser 
                where ';
                $this->arrayObj = [new addMembersInMedia(), new addNumberEvent(),
                new addMediaType(), new addAddedUser(), new addRangeDateFilming(),
                new addRangeDateUpload(), new addFiltr()];
            }
           public function getArrayKeySup(){
            return $this->arrayKeySup;
           }
           public function getKeys(){
            return $this->keys;
           }
           public function getTimeArray(){
            return $this->timeArray;
           }
           public function getFiltr(){
            return $this->filtr;
           }
           public function getArrayObj(){
            return $this -> arrayObj;
           }
           public function getArrayParam(){
            return $this -> arrayParam;
           }
           public function getQueryPartOne(){
            return $this -> queryPartOne;
           }
           private function generateQuery($arrayKeySup, $keys, $timeArray, $filtr, $arrayObj, $arrayParam, $queryPartOne){
                for($i = 0; $i < 4; $i++){
                    $num = 0;
                    while(array_search($arrayKeySup[$i].(string)$num, $keys) !== false)
                    {
                        $num++;
                    }
                    // var_dump("num", $num);
                    for($j = 0;$j < $num; $j++){
                        array_push($arrayParam[$i], $_POST[$arrayKeySup[$i].(string) $j]);
                    }
                }
               for ($i = 0; $i < count($arrayObj); $i++)
               {
                   if($i != 4 and $i != 5 and $i != 6)
                       if($arrayObj[$i]->addStr($arrayParam) != '' and $arrayObj[$i]->addStr($arrayParam) != ' mediaID in (select mediaID from membersInMedia where)')
                           $queryPartOne = $queryPartOne.$arrayObj[$i]->addStr($arrayParam).' and ';
                   if($i == 4 or $i == 5)
                       if($arrayObj[$i]->addStr($timeArray) != '')
                           $queryPartOne = $queryPartOne.$arrayObj[$i]->addStr($timeArray).' and ';
                   if ($i == 6)
                       if($arrayObj[$i]->addStr($filtr) != '')
                           $queryPartOne = $queryPartOne.$arrayObj[$i]->addStr($filtr).' limit 9;';
               }
            //    $index = strripos($queryPartOne, '', int $offset = 0): int|false
            //    var_dump('<br>');
            //    var_dump($queryPartOne.'---------<br>');
               return $queryPartOne;
           }
           public function saveQuery(){
               $stepQuery = '
               insert into historyquery (id, query, counter)
               values (null, "'.$this->generateQuery($this->getArrayKeySup(), $this->getKeys(),
               $this->getTimeArray(), $this->getFiltr(), $this->getArrayObj(),
               $this->getArrayParam(), $this->getQueryPartOne()).'", null);';
            //    var_dump('<br>'.$stepQuery);
               $connectionThree = new DBconnection();
                mysqli_query($connectionThree->getConnection(), $stepQuery);
           }
            public function getMedia(){
                $query = $this->generateQuery($this->getArrayKeySup(), $this->getKeys(),
                $this->getTimeArray(), $this->getFiltr(), $this->getArrayObj(),
                $this->getArrayParam(), $this->getQueryPartOne());
                $connectionTwo = new DBconnection();
                $result = mysqli_query($connectionTwo->getConnection(), $query);
                $arrayMedia = [];
                while($row = mysqli_fetch_array($result)){
                    $media = new Media($row['mediaID'], $row['eventID'], $row['name'], $row['caption'],
                                       $row['dateFilming'], $row['dateFilming'], $row['uploaddate'], $row['mediaType'],
                                       $row['pathmedia'], $row['addeduser'], $row['displayName'], $row['ispersonal']);
                    array_push($arrayMedia, $media);
                }
                return $arrayMedia;
            }
        }
        
        // $addMedia = new QueryScript();
        // $arrayMedia = $addMedia->getMedia();
        // $arrayTest = [1,2,3];
        // $oCurl = curl_init();
        // curl_setopt($oCurl, CURLOPT_URL, 'http://localhost:4000/insertMedia.php');
        // curl_setopt($oCurl, CURLOPT_POST, true);
        // curl_setopt($oCurl, CURLOPT_HEADER, true);
        // curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, false);
        // curl_setopt($oCurl, CURLOPT_POSTFIELDS, $arrayTest);
        // curl_setopt($oCurl, CURLOPT_TIMEOUT, 10); // Увеличьте значение тайм-аута


        // $result = curl_exec($oCurl);
        // curl_close($oCurl);
        // header('location:insertMedia.php')



         
    // foreach($_POST as $key => $value)
    // {
    //     var_dump($key, $value."<br>");
    // }
    // for($i = 0; $i < 4; $i++){
        //     for ($j = 0; $j < count($arrayParam[$i]); $j++){
            //         if($i == 0)
            //         echo $arrayParam[$i][$j]."------numberPerson<br>";
            //     else if($i == 1)
            //     echo $arrayParam[$i][$j]."------numberEvent<br>";
            // else if($i == 2)
            // echo $arrayParam[$i][$j]."------numberMediaType<br>";
            // else if($i == 3)
            // echo $arrayParam[$i][$j]."------numberAddedUser<br>";
            // }
            // }
            
            // $query = $queryPartOne.' where '.$addStrObj->addMembersInMedia($arrayParam).' and '.
            // $addStrObj->addNumberEvent($arrayParam).' and '.$addStrObj->addMediaType($arrayParam).' and '.
            // $addStrObj->addAddedUser($arrayParam).' and '.$addStrObj->addRangeDateFilming($timeArray).' and '. 
            // $addStrObj->addRangeDateUpload($timeArray).' and '.$addStrObj->addFiltr($filtr);
            
            // for ($i = 0; $i < count($_POST); $i++)
            // {
                //     echo $_POST[$i]."<br>";
                // }
                // var_dump($_POST);
                // $num = count($_POST);
        // for($i = 0; $i < $num; $i++)
        // {
            //     echo$_POST['numberPerson:'.(string)$i];
            // }
            // $addStrObj->addMembersInMedia($arrayParam);
            // $addStrObj->addNumberEvent($arrayParam);
            // $addStrObj->addmediaType($arrayParam);
            // $addStrObj->addAddedUser($arrayParam);
            // $addStrObj->addRangeDateFilming($timeArray);
            // $addStrObj->addRangeDateUpload($timeArray);
            // $addStrObj->addFiltr($filtr);
            // var_dump('keys:', $keys);
            // for($i = 0; $i < 4; $i++){
            //     $num = 0;
            //     while(array_search($arrayKeySup[$i].(string) $num, $keys) !== false)
            //     {
            //         var_dump($num, $arrayKeySup[$i], '------num<br>');
            //         $num++;
            
            //     }
            
            
    
    ?>

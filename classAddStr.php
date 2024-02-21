<?php
class addMembersInMedia{
    public function addStr($array){
        if(is_null($array[2]) != true){
            $arrayParam = $array;
            $num = count($arrayParam[0]);
            $arrayQuery = [];
            for($j = 0; $j < $num; $j++)
            {
                $queryPartTwo = ' memberID = '.$arrayParam[0][$j].' or ';
                array_push($arrayQuery, $queryPartTwo);
            }
            $queryPartThree = '';
            foreach ($arrayQuery as $value):
                $queryPartThree = $queryPartThree.$value;
            endforeach;
            $substring = "or";
            $index = strrpos($queryPartThree, $substring);
            $length = 3;
            $queryPartThree = substr($queryPartThree, 0, $index) . substr($queryPartThree, $index + $length);
            $queryPartThree = ' mediaID in (select mediaID from membersInMedia where'.$queryPartThree.')';
            // if($queryPartThree != ' mediaID in (select mediaID from membersInMedia where)')
            //     var_dump($queryPartThree.'<br>');
            return $queryPartThree;
        } else 
            return '';
    }
}
class addNumberEvent{
    public function addStr($array){
        if(is_null($array[1]) != true){
            $arrayQuery = [];
            $queryPartFour = '';
            for($j = 0; $j< count($array[1]); $j++){
                array_push($arrayQuery, ' media.eventID = '.$array[1][$j].' or');
            }
            for($i = 0; $i < count($arrayQuery); $i++)
            {
                if($i != count($arrayQuery) - 1)
                    $queryPartFour = $queryPartFour.$arrayQuery[$i];
                else
                    $queryPartFour = $queryPartFour.str_replace('or', "", $arrayQuery[$i]);
            }
            if($queryPartFour != '')
                var_dump($queryPartFour.'<br>');
            return $queryPartFour;
        } else
            return '';
    }
}
class addMediaType{
    public function addStr($array){
        if(is_null($array[2]) != true){
            $arrayQuery = [];
            $queryPartFive = '';
            for ($j = 0; $j < count($array[2]); $j++){
                array_push($arrayQuery, "' mediaType = '".$array[2][$j]."' or");
            }
            for($i = 0; $i < count($arrayQuery); $i++){
                if($i != count($arrayQuery) - 1)
                    $queryPartFive = $queryPartFive.$arrayQuery[$i];
                else 
                    $queryPartFive = $queryPartFive.str_replace('or', "", $arrayQuery[$i]);
            }
            // if($queryPartFive != '')
            //     var_dump($queryPartFive.'<br>');
            return $queryPartFive;
        } else
            return '';
    }
}
class addAddedUser{
    public function addStr($array){
        if(is_null($array[3]) != true){ 
            $arrayQuery = [];
            $queryPartSix = '';
            for( $j = 0; $j < count($array[3]); $j++){
                array_push($arrayQuery, ' AddedUser = '.$array[3][$j].' or');
            }
            for($i = 0; $i < count($arrayQuery);$i++){
                if($i != count($arrayQuery) - 1)
                    $queryPartSix = $queryPartSix.$arrayQuery[$i];
                else 
                    $queryPartSix = $queryPartSix.str_replace('or', "", $arrayQuery[$i]);
            }
            // if($queryPartSix != '')
            //     var_dump($queryPartSix.'<br>');
            return $queryPartSix;
        } else 
            return '';
}
}
class addRangeDateFilming{
    public function addStr($array){
        $queryPartSeven = '';
        if(($array[0] != null) and ($array[1] != null))
            $queryPartSeven = 'dateFilming >= '.$array[0].' and dateFilming <= '.$array[1];
        else if ($array[0] != null and $array[1] == null)
            $queryPartSeven = 'dateFilming = '.$array[0];
        else if ($array[1] != null and $array[0] == null)
            $queryPartSeven = 'dateFilming = '.$array[1];
        // if($queryPartSeven != '')
        //     var_dump($queryPartSeven."<br>");    
        return $queryPartSeven;
    }}
class addRangeDateUpload{
    public function addStr ($array){
        $queryPartEight = '';
        if(($array[2] != null) and ($array[3] != null))
            $queryPartEight = 'UploadDate >= '.$array[2].' and UploadDate <= '.$array[3];
        else if ($array[2] != null and $array[3] == null)
            $queryPartEight = 'UploadDate = '.$array[2];
        else if ($array[3] != null and $array[2] == null)
            $queryPartEight = 'UploadDate = '.$array[3];
        // if($queryPartEight != '')
        //     var_dump($queryPartEight);    
        return $queryPartEight;
    }
}
class addFiltr{
    public function addStr($filtr){
        $queryPartTen = '';
        if($filtr)
            $queryPartTen = 'isPersonal = true';
        else 
            $queryPartTen = 'isPersonal = false';
        // if($queryPartTen != '')
        //    var_dump($queryPartTen);
        return $queryPartTen;
    }
}
    // public function addShowMe($showMe){
    //     $queryPartNine = '';
    //     if($showMe){}
    // }
?>

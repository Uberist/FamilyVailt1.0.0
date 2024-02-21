<?php
class media{
    private $mediaID;
    private $eventID;
    private $eventName;
    private $caption;
    private $dateFilming;
    private $uploadDate;
    private $mediaType;
    private $pathMedia;
    private $addedUser;
    private $displayName;
    private $isPersonal;
    private $membersInMedia;
    function __construct($mediaID,
     $eventID,$eventName, $caption, $dateFilming,
     $uploadDate, $mediaType, $pathMedia,
     $addedUser, $displayName, $isPersonal,
     $membersInMedia){
        $this->mediaID = $mediaID;
        $this->eventID = $eventID;
        $this->eventName = $eventName;
        $this->caption = $caption;
        $this->dateFilming = $dateFilming;
        $this->uploadDate = $uploadDate;
        $this->mediaType = $mediaType;
        $this->pathMedia = $pathMedia;
        $this->addedUser = $addedUser;
        $this->displayName = $displayName;
        $this->isPersonal = $isPersonal;
        $this->membersInMedia = $membersInMedia;
    }
}
?>
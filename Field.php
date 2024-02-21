<?php
     class Field{
        private $name;
        private $value;
        private $error;
        public function __construct($Name, $value, $error){
            $this->name = $Name;
            $this->value = $value;
            $this->error = [];
        }
        public function isEmpty($value){
            if($value == '' or $value == null){
                return true;
            if($value != '')
                return false;
            }
        }
        public function getName(){
            return $this->name;
        }
        public function getValue(){
            return $this->value;
        }
        public function setValue($value){
            $this->value = $value;
        }
        public function getError(){
            return $this->error;
        }
        public function addErorr($errorText){
            array_push($this->error, $errorText);
        }
        public function setError($errorArray){
            $this->error = $errorArray;
        }
    }
?>
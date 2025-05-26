<?php
class Manusia {
    protected $name;
    protected $age;
    protected $nik = "1234567890";

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        return $this->name = $name;
    }
    public function getAge(){
        return $this->age;
    }
    public function setAge($age){
        return $this->age = $age;
    }

    public function getNIK() {
        return " nik ($this->nik) ";
    }
}



<?php




class AppUser{
    private $userId;
    private $username;
    private $password;
    private Agency $agency;
    private Address $adress;

    public function __construct(){

    }

    public function getUserUd(){
        return $this->userId;
    }
    public function setUserUd($userId){
       $this->userId = $userId;
    }
    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
       $this->username = $username;
    }
    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }
    public function getAgency(){
        return $this->agency;
    }

    public function setAgency($agency){
        $this->agency = $agency;
    }
    public function getAdress(){
        return $this->adress;
    }

    public function setAdress($adress){
        $this->adress = $adress;
    }


}

?> 
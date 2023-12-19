<?php




class AppUser{
    private $userId;
    private $username;
    private $password;
    private Agency $agency;
    private Adress $adress;

    public function __construct(){

    }

    public function getUserId(){
        return $this->userId;
    }
    public function setUserId($userId){
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

    public function setAgency(Agency $agency){
        $this->agency = $agency;
    }
    public function getAdress(){
        return $this->adress;
    }

    public function setAdress(Adress $adress){
        $this->adress = $adress;
    }


}

?> 


<?php


class Account{
    private $accountId;
    private $balance;
    private $RIB ;
    
    private AppUser $appUser;
    public function __construct(){

    }
    
    public function getAccountID(){
        return $this->accountId;
    }
    public function setAccountId($accountId){
        $this->accountId = $accountId;
    }
    public function getBalance(){
        return $this->balance;
    }
    public function setBalance($balance){
        $this->balance = $balance;
    }
    public function getRIB(){
        return $this->RIB;
    }
    public function setRIB($RIB){
        $this->RIB = $RIB;
    }
    public function getAppUser(){
        return $this->appUser;
    }
    public function setAppUser($appUser){
        $this->appUser = $appUser;
    }
}


?>
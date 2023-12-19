<?php


class Saving_AccountImp implements Saving_AccountI{
    private $db ;

    public function __construct(Database $db){
        $this->db = $db;
    }
    
   

    public function addAccount(Saving_account $account){
        $addAccount = "INSERT INTO saving_account VALUES (:id , :balance , :rib , :userID)";
        $this->db->query($addAccount);
        $this->db->bind(":id",$account->getAccountID());
        $this->db->bind(":balance",$account->getBalance());
        $this->db->bind(":rib",$account->getRIB());
        $this->db->bind(":userID",$account->getAppUser()->getUserId());

        try{
            $this->db->execute();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }

    }

    
    public function deleteAccount($accountId){

    }

    public function generateRib(){
        $rib = '';
        $rib .= mt_rand(1, 9);
        for ($i = 1; $i < 16; $i++) {
            $rib .= mt_rand(0, 9);
        }
        
        return $rib;
    }

}



?>
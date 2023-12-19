<?php


class AccountServiceImp implements AccountServiceI{
    private $db ;

    public function __construct(Database $db){
        $this->db = $db;
    }
    
    public function getAllAccounts(){
        $fetchAccountsQuery = "SELECT ua.accountID, ua.balance, ua.rib, ua.userID, ua.account_type, u.username FROM ( SELECT accountID, balance, rib, userID, 'main' AS account_type FROM account UNION SELECT accountID, balance, rib, userID, 'active' AS account_type FROM active_account UNION SELECT accountID, balance, rib, userID, 'saving' AS account_type FROM saving_account ) ua JOIN users u ON ua.userID = u.userID ";
        $this->db->query($fetchAccountsQuery);
        try{
            return $this->db->fetchMultipleRow();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function addAccount(Account $account){
        $addAccount = "INSERT INTO account VALUES (:id , :balance , :rib , :userID)";
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
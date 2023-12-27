<?php


class Active_AccountImp implements Active_accountI{
    private $db ;

    public function __construct(Database $db){
        $this->db = $db;
    }

    public function getAllActiveAccounts(){
        $fetchAccountsQuery = "SELECT * FROM account JOIN users ON account.userID = users.userID WHERE type ='active'";
        $this->db->query($fetchAccountsQuery);
        try{
            return $this->db->fetchMultipleRow();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }
    

    public function getAllAccounts(){
        $fetchAccountsQuery = "SELECT * FROM account JOIN users ON account.userID = users.userID";
        $this->db->query($fetchAccountsQuery);
        try{
            return $this->db->fetchMultipleRow();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function getAccountById($accountId){
        $fetchAccountQuery = "SELECT * FROM account WHERE accountID = :id";
        $this->db->query($fetchAccountQuery);
        $this->db->bind(":id",$accountId);
        try{
            return $this->db->fetchOneRow();
        } 
        catch(PDOException $e){
            die($e->getMessage());
        }
    }
    
    public function addAccount(Active_Account $account){
        $addAccount = "INSERT INTO  account VALUES (:id , :balance , :rib , :userID, :acc_type)";
        $this->db->query($addAccount);
        $this->db->bind(":id",$account->getAccountID());
        $this->db->bind(":balance",$account->getBalance());
        $this->db->bind(":rib",$account->getRIB());
        $this->db->bind(":userID",$account->getAppUser()->getUserId());
        $this->db->bind(":acc_type",$account->getType());
        try{
            $this->db->execute();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }

    }

    public function updateBalance($accountId,$amount,$TransactionType,$oldBalance){
         if($TransactionType == "debit"){
            $updateBalanceQuery = "UPDATE account SET balance = :newBalance WHERE accountId = :accountId";
            $this->db->query($updateBalanceQuery);
            $this->db->bind(":newBalance",$oldBalance-$amount);
            $this->db->bind(":accountId",$accountId);
            try{
                $this->db->execute();
            }
            catch(PDOException $e){
                die($e->getMessage());
            }
         }
         else if($TransactionType == "credit"){
            $updateBalanceQuery = "UPDATE account SET balance = :newBalance WHERE accountId = :accountId";
            $this->db->query($updateBalanceQuery);
            $this->db->bind(":newBalance",$oldBalance+$amount);
            $this->db->bind(":accountId",$accountId);
            try{
                $this->db->execute();
            }
            catch(PDOException $e){
                die($e->getMessage());
            }
         }
    }


    
    public function deleteAccount($accountId){
       $deleteQuery = "DELETE FROM account WHERE accountID = :id";
       $this->db->query($deleteQuery);
       $this->db->bind(":id",$accountId);
       try{
         $this->db->execute();
       }
       catch(PDOException $e){
        die($e->getMessage());
       }
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
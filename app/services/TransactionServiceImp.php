<?php





class TransactionServiceImp implements TransactionServiceI{
    private $db;
    public function __construct(Database $db){
      $this->db = $db ;
    }
    public function getAllTransactions(){
       $fetchTransactionsQuery = "SELECT * FROM transactions JOIN account ON transactions.accountID = account.accountID JOIN users ON account.userID = users.userID";
       $this->db->query($fetchTransactionsQuery);

       try{
         return $this->db->fetchMultipleRow();
       }
       catch(PDOException $e){
        die($e->getMessage());
       }
    }  

    public function getTransactionsOfAccount($accountId){
            $fetchTransactionsQuery = "SELECT * FROM transactions JOIN account ON transactions.accountID = account.accountID JOIN users ON account.userID = users.userID WHERE account.accountID = :id";
            $this->db->query($fetchTransactionsQuery);
            $this->db->bind(":id",$accountId);
            try{
              return $this->db->fetchMultipleRow();
            }
            catch(PDOException $e){
             die($e->getMessage());
            }
        }
    public function addTransaction(Transaction $transaction){
        $addTransactionQuery = "INSERT INTO transactions VALUES (:id , :montant , :type , :accountId)";
        $this->db->query($addTransactionQuery);
        $this->db->bind(":id",$transaction->getTransactionID());
        $this->db->bind(":montant",$transaction->getMontant());
        $this->db->bind(":type",$transaction->getType());
        $this->db->bind(":accountId",$transaction->getAccount()->getAccountID());

        try{
            $this->db->execute();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }

    }
    public function updateTransaction(Transaction $transaction){

    }
    public function deleteTransaction($transactionId){
        $deleteTransactionQuery = "DELETE FROM transactions WHERE transactionID = :id";
        $this->db->query($deleteTransactionQuery);
        $this->db->bind(":id",$transactionId);
        

        try{
            $this->db->execute();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }

    }
}



?>
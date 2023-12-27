<?php




interface TransactionServiceI{
    public function getAllTransactions();
    public function addTransaction(Transaction $transaction);
    public function updateTransaction(Transaction $transaction);
    public function deleteTransaction($transactionId);
}



?>

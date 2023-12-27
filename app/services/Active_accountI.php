<?php



interface Active_accountI {

    public function addAccount(Active_Account $account);
    public function updateBalance($accountId,$amount,$transactionType,$oldBalance);
    public function deleteAccount($accountId);
    public function generateRib();

}


?>


?>
<?php




interface AccountServiceI {
    public function getAllAccounts();

    public function addAccount(Account $account);
    public function deleteAccount($accountId);

    public function generateRib();

}


?>
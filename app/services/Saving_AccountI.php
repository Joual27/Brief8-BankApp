<?php


interface Saving_AccountI {

    public function addAccount(Saving_account $account);
    public function deleteAccount($accountId);

    public function generateRib();

}


?>

?>
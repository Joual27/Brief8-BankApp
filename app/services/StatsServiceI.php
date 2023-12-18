<?php


interface StatsServiceI{
    public function totalClients();
    public function totalAccounts();
    public function totalTransactions();
    public function overallMoney();
}

?>
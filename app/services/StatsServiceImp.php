<?php


class StatsServiceImp implements StatsServiceI{

    private $db;
    public function __construct(Database $db){
      $this->db = $db;
    }
    public function totalClients(){
       $totalClients = "SELECT COUNT(*) as count FROM users JOIN roleofuser ON users.userID = roleofuser.userID WHERE roleofuser.roleName = 'client'";
       $this->db->query($totalClients);
       try{
         $clients = $this->db->fetchOneRow();
         return $clients->count;
       }
       catch(PDOException $e){
        die($e->getMessage());
       }
    }

    public function totalAccounts(){
        $totalAccounts = "SELECT COUNT(*) as count FROM account";
        $this->db->query($totalAccounts);
        try{
          $accounts = $this->db->fetchOneRow();
          return $accounts->count;
        }
        catch(PDOException $e){
         die($e->getMessage());
        }
    }
    public function totalTransactions(){
        $totalTransactions = "SELECT COUNT(*) as count FROM transactions";
        $this->db->query($totalTransactions);
        try{
          $transactions = $this->db->fetchOneRow();
          return $transactions->count;
        }
        catch(PDOException $e){
         die($e->getMessage());
        }
       
    }
    public function overallMoney(){
        $overallBalance = "SELECT SUM(balance) as count FROM account";
        $this->db->query($overallBalance);
        try{
          $balance = $this->db->fetchOneRow();
          return $balance->count;
        }
        catch(PDOException $e){
         die($e->getMessage());
        }
    }
}


?>
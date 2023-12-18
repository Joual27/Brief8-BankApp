<?php


class LoginServiceImp implements LoginServiceI{
    private $db;
    public function __construct(Database $db){
       $this->db = $db;
    }
    public function login($username,$pw){
       $sql = "SELECT * FROM users WHERE username = :username AND userPass = :userPass";
       $this->db->query($sql);
       $this->db->bind(":username",$username);
       $this->db->bind(":userPass",$pw);
       try{
        $user = $this->db->fetchOneRow();
        if(empty($user)){
            return false;
        }
        return true;
       }
       catch(PDOException $e){
         die($e->getMessage());
       }
    }

    public function checkRole($username){
        $sql = "SELECT * FROM users JOIN roleOFUser ON users.userID = roleOfUser.userID WHERE users.username = :username";
        $this->db->query($sql);
        $this->db->bind(":username",$username);
        try{
            $user = $this->db->fetchOneRow();
            return $user->roleName;
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }
 
}


?>
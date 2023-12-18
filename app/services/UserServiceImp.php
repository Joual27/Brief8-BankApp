<?php


class UserServiceImp implements UserServiceI{
    private $db;

    public function __construct(Database $db){
      $this->db = $db;
    }
    public function getAllUsers(){
       $fetchUsers = "SELECT * FROM users JOIN adress ON users.addressId = adress.addressId";
       $this->db->query($fetchUsers);
       try{
        return $this->db->fetchMultipleRow();
       }
       catch(PDOException $e){
          die($e->getMessage());
       }
    }
    public function getUserById($userId){
    //    $fetchUser = ""
    }
    public function addUser(AppUser $appUser,Address $adress,RoleOfUser $roleOfUser){

    }
    public function updateUser(AppUser $appUser,Address $adress){

    }
    public function deleteUser($userId){

    }
}


?>
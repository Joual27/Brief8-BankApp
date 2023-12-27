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
    public function getAllClients(){
       $fetchUsers = "SELECT * FROM users JOIN adress ON users.addressId = adress.addressId JOIN roleofuser ON users.userId = roleofuser.userId WHERE roleofuser.roleName = 'client' ";
       $this->db->query($fetchUsers);
       try{
        return $this->db->fetchMultipleRow();
       }
       catch(PDOException $e){
          die($e->getMessage());
       }
    }
    public function getUserById($userId){
       $fetchUser = "SELECT * FROM users JOIN adress ON users.addressID = adress.addressID JOIN roleofuser ON users.userID = roleofuser.userID WHERE users.userID = :id";
       $this->db->query($fetchUser);
       $this->db->bind(":id",$userId);

       try{
         return $this->db->fetchOneRow();
       }
       catch(PDOException $e){
        die($e->getMessage());
       }
    }
    public function addUser(AppUser $appUser,$roleName){
        $addAdressQuery = "INSERT INTO adress VALUES (:id , :ville, :quartier , :rue , :codePostal , :email , :phone)";
        $this->db->query($addAdressQuery);
        $this->db->bind(":id" , $appUser->getAdress()->getAddressId());
        $this->db->bind(":ville" , $appUser->getAdress()->getVille());
        $this->db->bind(":quartier" , $appUser->getAdress()->getQuartier());
        $this->db->bind(":rue" , $appUser->getAdress()->getRue());
        $this->db->bind(":codePostal" , $appUser->getAdress()->getCodePostal());
        $this->db->bind(":email" , $appUser->getAdress()->getEmail());
        $this->db->bind(":phone" , $appUser->getAdress()->getPhone());
        try{
           $this->db->execute();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }

        $addUserQuery = "INSERT INTO users VALUES (:id , :username , :pw , :adrId , :agencyId)";
        $this->db->query($addUserQuery);
        $this->db->bind(":id" , $appUser->getUserId());
        $this->db->bind(":username" , $appUser->getUsername());
        $this->db->bind(":pw" , $appUser->getPassword());
        $this->db->bind(":adrId" , $appUser->getAdress()->getAddressId());
        $this->db->bind(":agencyId" , $appUser->getAgency()->getAgencyId()); 
      
        try{
            $this->db->execute();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }

        $addRoleOfUserQuery = "INSERT INTO roleofuser VALUES (:roleName, :id)";
        $this->db->query($addRoleOfUserQuery);
        $this->db->bind(":id", $appUser->getUserId());
        $this->db->bind(":roleName", $roleName);

        try{
            $this->db->execute();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }

    }
    public function updateUser(AppUser $appUser) {
        $updateAdressQuery = " UPDATE adress SET ville = :ville, quartier = :quartier, rue = :rue, codePostal = :codePostal, email = :email, phone = :phone WHERE addressID = :adrID";
        $this->db->query($updateAdressQuery);
    
        $this->db->bind(":ville", $appUser->getAdress()->getVille());
        $this->db->bind(":quartier", $appUser->getAdress()->getQuartier());
        $this->db->bind(":rue", $appUser->getAdress()->getRue());
        $this->db->bind(":codePostal", $appUser->getAdress()->getCodePostal());
        $this->db->bind(":email", $appUser->getAdress()->getEmail());
        $this->db->bind(":phone", $appUser->getAdress()->getPhone());
        $this->db->bind(":adrID", $appUser->getAdress()->getAddressId());
    
        try {
            $this->db->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function deleteUser($adressId,$userId){
        try {

            $this->db->query("START TRANSACTION");
            $this->db->execute();

            $deleteUserQuery = "DELETE FROM users WHERE userID = :userId";
            $this->db->query($deleteUserQuery);
            $this->db->bind(":userId", $userId);
            $this->db->execute();
    
            $deleteAddressQuery = "DELETE FROM adress WHERE addressID = :adressId";
            $this->db->query($deleteAddressQuery);
            $this->db->bind(":adressId", $adressId);
            $this->db->execute();
    
            
            
    
            
            $this->db->query("COMMIT");
            $this->db->execute();

    
            echo "Records deleted successfully!";
        } catch (PDOException $e) {
            
            $this->db->query("ROLLBACK");
            $this->db->execute();
            die("Error: " . $e->getMessage());
        }
}
}


?>
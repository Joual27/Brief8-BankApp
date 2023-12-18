<?php 


class RoleOfUser {
    private $roleName;
    private $userID;

    public function __construct() {
    }

    public function getRoleName() {
        return $this->roleName;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function setRoleName($roleName) {
        $this->roleName = $roleName;
    }

    public function setUserID($userID) {
        $this->userID = $userID;
    }
}



?>
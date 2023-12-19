<?php




interface UserServiceI{
        public function getAllUsers();
        public function getUserById($userId);
        public function addUser(AppUser $appUser,$roleName);
        public function updateUser(AppUser $appUser);
        public function deleteUser($adressId,$userId);
}


?>
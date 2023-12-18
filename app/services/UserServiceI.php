<?php




interface UserServiceI{
        public function getAllUsers();
        public function getUserById($userId);
        public function addUser(AppUser $appUser,Address $adress,RoleOfUser $roleOfUser);
        public function updateUser(AppUser $appUser,Address $adress);
        public function deleteUser($userId);
}


?>
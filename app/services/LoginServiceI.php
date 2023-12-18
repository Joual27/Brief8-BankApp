<?php
   


   interface LoginServiceI{
     public function login($username,$pw);

     public function checkRole($username);

     }

?>
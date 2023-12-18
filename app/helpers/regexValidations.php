<?php
function validateEmail($email){
    $regex = "^[\w-_\.]+@([\w-_]+\.)+[\w-]{2,4}$";
    if(preg_match($regex,$email)){
        return true ;
    }
    else{
        return false;
    }
}
function validatePw($pw){
    $regex = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{8,}$/";
    if(preg_match($regex,$pw)){
        return true ;
    }
    else{
        return false;
    }
}
function validateName($name){
    $regex = "^[a-zA-Z]$";
    if(preg_match($regex,$name)){
        return true ;
    }
    else{
        return false;
    }
}
?>
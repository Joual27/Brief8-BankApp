<?php

 
if($_SESSION["username"] == "" && $_SESSION["roleName"] == ""){
    header("location:".URLROOT."/pages/login");
}
else if($_SESSION["roleName"] !== "client"){
    header("location:".URLROOT."/admin/dashboard");
}

?>



IM USER DASHY DASH!




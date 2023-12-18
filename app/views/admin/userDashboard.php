<?php

require APPROOT . '/views/incFile/htmlHeader.php'; 
 require APPROOT . '/views/incFile/sidebar.php'; 
if($_SESSION["username"] == "" && $_SESSION["roleName"] == ""){
    header("location:".URLROOT."/pages/login");
}
else if($_SESSION["roleName"] == "client"){
    header("location:".URLROOT."/client/dashboard");
}




?>



<main>
  <?php 
 require APPROOT . '/views/incFile/userInfo.php'; 
?>
    <div class="ml-[16%] mt-[1rem]">
        <button class="py-[0.6rem] px-[1.2rem] bg-indigo-500 text-white font-semibold rounded-lg"><a hre>+ Add User</a></button>
    </div>

   <div>
    <table id="users" style="width: 79% ; margin-left : 16% ;">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>USERNAME</td>
                    <td>VILLE</td>
                    <td>QUARTIER</td>
                    <td>RUE</td>
                    <td>CODE POSTAL</td>
                    <td>EMAIL</td>
                    <td>ACTIONS</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data["users"] as $user){
                    echo "
                        <tr>
                            <td>$user->userID</td>
                            <td>$user->username</td>
                            <td>$user->ville</td>
                            <td>$user->quartier</td>
                            <td>$user->rue</td>
                            <td>$user->codePostal</td>
                            <td>$user->email</td>
                            <td>ACTIONS</td>
                        </tr>
                    
                    ";
                } ?>
            </tbody>
        </table>
   </div>

</main>

<?php 
 require APPROOT . '/views/incFile/footer.php'; 
?>

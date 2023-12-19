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
        <button class="py-[0.6rem] px-[1.2rem] bg-indigo-500 text-white font-semibold rounded-lg"><a href="<?php echo URLROOT ?>/admin/addUser">+ Add User</a></button>
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
                <?php foreach($data["users"] as $user){ ?>
                        <tr>
                            <td><?= $user->userID ?></td>
                            <td><?= $user->username ?></td>
                            <td><?= $user->ville ?></td>
                            <td><?= $user->quartier ?></td>
                            <td><?= $user->rue ?></td>
                            <td><?= $user->codePostal ?></td>
                            <td><?= $user->email ?></td>
                            <td class="flex gap-[10px]">
                                <a href='<?=URLROOT?>/admin/deleteUser?id=<?= $user->addressID ?>&userId=<?= $user->userID?>' class='flex items-center justify-center bg-rose-500 text-white w-[40px] h-[40px]'>
                                    <i class='fa-solid fa-trash'></i>
                                </a>
                                <a href='<?=URLROOT?>/admin/editUser?id=<?= $user->userID ?>' class='flex items-center justify-center bg-green-500 text-white w-[40px] h-[40px]'>
                                    <i class='fa-solid fa-pen'></i>
                                </a>
                            </td>
                        </tr>  
                <?php  } ?>
            </tbody>
        </table>
   </div>

</main>

<?php 
 require APPROOT . '/views/incFile/footer.php'; 
?>

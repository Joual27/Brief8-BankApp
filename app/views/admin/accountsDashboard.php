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
        <button class="py-[0.6rem] px-[1.2rem] bg-indigo-500 text-white font-semibold rounded-lg"><a href="<?php echo URLROOT ?>/admin/addAccount">+ Add Account</a></button>
    </div>

   <div>
    <table id="users" style="width: 79% ; margin-left : 16% ;">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Balance</td>
                    <td>RIB</td>
                    <td>Holder</td>
                    <td>Type</td>
                    <td>ACTIONS</td>
                </tr>
            </thead>
            <tbody>
               <?php foreach($data["accounts"] as $account){?>
                  <tr>
                    <td><?= $account->accountID ?></td>
                    <td><?= $account->balance ?></td>
                    <td><?= $account->rib?></td>
                    <td><?= $account->username?></td>
                    <td><?= $account->account_type?></td>
                    <td>
                        <a href='<?=URLROOT?>/admin/deleteAccount?id=<?= $account->accountID ?>' class='flex items-center justify-center bg-rose-500 text-white w-[40px] h-[40px]'>
                            <i class='fa-solid fa-trash'></i>
                        </a>
                    </td>
                  </tr>
 
               <?php } ?>
            </tbody>
        </table>
   </div>

</main>

<?php 
 require APPROOT . '/views/incFile/footer.php'; 
?>

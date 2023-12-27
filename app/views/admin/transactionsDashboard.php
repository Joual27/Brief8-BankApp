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
        <button class="py-[0.6rem] px-[1.2rem] bg-indigo-500 text-white font-semibold rounded-lg"><a href="<?php echo URLROOT ?>/admin/addTransaction">+ Add Transaction</a></button>
    </div>
<div>
    <table id="users" style="width: 79% ; margin-left : 16%;">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>AMOUNT</td>
                    <td>TYPE</td>
                    <td>ACCOUNT'S RIB</td>     
                    <td>ACCOUNT'S HOLDER</td>     
                    <td>ACTIONS</td>
               </tr>
            </thead>
            <tbody>
                <?php foreach($data["transactions"] as $transaction ){ ?>
                <tr>
                    <td><?= $transaction->transactionID ?></td>
                    <td><?= $transaction->montant ?></td>
                    <td><?= $transaction->transactionType ?></td>
                    <td><?= $transaction->rib ?></td>     
                    <td><?= $transaction->username ?></td>     
                    <td>
                       <a href='<?=URLROOT?>/admin/deleteTransaction?id=<?= $transaction->transactionID ?>' class='flex items-center justify-center bg-rose-500 text-white w-[40px] h-[40px]'>
                            <i class='fa-solid fa-trash'></i>
                        </a>
                        
                    </td>
               </tr>
                <?php } ?>
            </tbody>
        </table>
        <p class="text-red-500 font-semibold">
                    <?php if(!empty($data["error"])){
                        echo $data["error"];
        }?>
    </p>
</div>

</main>

<?php 
require APPROOT . '/views/incFile/footer.php'; 
?>

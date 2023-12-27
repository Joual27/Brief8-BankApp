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
        <p class="font-semibold text-[1.1rem]">Transactions of account : <span class="text-indigo-500 font-bold"><?= $data["transactions"][0]->accountID ?></span> with Holder <span class="text-indigo-500 font-bold"><?= $data["transactions"][0]->username ?></span> and RIB :<span class="text-indigo-500 font-bold"><?= $data["transactions"][0]->rib ?></span>  </p>
    </div>
<div>
    <table id="users" style="width: 79% ; margin-left : 16%;">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>AMOUNT</td>
                    <td>TYPE</td>
               </tr>
            </thead>
            <tbody>
                <?php foreach($data["transactions"] as $transaction ){ ?>
                    <tr>
                        <td><?= $transaction->transactionID ?></td>
                        <td><?= $transaction->montant ?></td>
                        <td><?= $transaction->transactionType ?></td>                       
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

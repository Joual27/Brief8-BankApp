<?php 

require APPROOT . '/views/incFile/Header.php'; 
 require APPROOT . '/views/incFile/sidebar.php'; 
if($_SESSION["username"] == "" && $_SESSION["roleName"] == ""){
    header("location:".URLROOT."/pages/login");
}
else if($_SESSION["roleName"] == "client"){
    header("location:".URLROOT."/client/dashboard");
}




?>

<div class="container" style="max-height: 300px !important;">
        <header>Add Transaction Form</header>

        <form action="" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Transaction Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Amount</label>
                            <input type="text" name="montant" placeholder="Enter Amount" >
                        </div>

                        <div class="input-field" >
                            <label>Type</label>
                            <select name="type">
                                <option value="debit">debit</option>
                                <option value="credit">credit</option>
                            </select>
                        </div>
                        <div class="input-field" id="bankLogo">
                            <label>Account</label>
                            <select name="account">
                                <option value="">Select An Account</option>
                                <?php foreach($data["accounts"] as $account) { ?>
                                    <option value="<?= $account->accountID?>"><?= $account->username?> : <?= $account->rib?> </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div>
                            <button type="submit" class="bg-indigo-500 py-[0.5rem] px-[1rem] rounded-lg">Submit</button>
                        </div>

                    </div>
                </div>
            </div>
           
            
        </form>
        <p class="text-red-500 font-semibold">
         <?php if(!empty($data["error"])){
            echo $data["error"];
         }?>
        </p>
       
        
       

    
    </div>



<?php require APPROOT . '/views/incFile/footer.php';?>

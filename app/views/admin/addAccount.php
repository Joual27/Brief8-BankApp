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
        <header>Add Account Form</header>

        <form action="" method="POST" >
            <div class="form first">
                <div class="details personal">
                    <span class="title">Account details</span>

                    <div class="fields" style="display : flex ; gap : 30px !important; ">
                        <div class="input-field" style="width : 200px !important;">
                            <label>Balance</label>
                            <input style="width : 100% !important;" type="text" name="balance" placeholder="Enter Balance" >
                        </div>

                        <div class="input-field" style="width : 200px !important;">
                            <label>Holder</label>
                            <select name="holder" style="width : 100% !important;">
                                <option value="">Select account's holder</option>
                                <?php foreach($data["users"] as $user){ ?>
                                   <option value="<?= $user->userID ?>"><?= $user->username ?></option>
                                <?php  }?>
                            </select>
                        </div>
                        <div class="input-field" style="width : 200px !important;">
                            <label>type</label>
                            <select name="type" style="width : 100% !important;">
                                <option value="">Select account's type</option>
                                <option value="main">Main</option>
                                <option value="saving">saving</option>
                                <option value="active">active</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="bg-indigo-500 py-[0.5rem] px-[0.7rem] rounded-lg">Submit</button>
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

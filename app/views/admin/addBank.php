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
        <header>Add Bank Form</header>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Bank Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Bank Name</label>
                            <input type="text" name="bankName" placeholder="Enter the bank's name" >
                        </div>

                        <div class="input-field" id="bankLogo">
                            <label>Bank Logo</label>
                            <input type="file" name="logo" style="border : none">
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

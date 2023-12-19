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

<div class="container">
        <header>Update User Form</header>   

        <form action="" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Username</label>
                            <input type="text" name="username" value="<?= $data['username']?>" placeholder="Enter your username" readonly>
                        </div>
                        
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Adress Credentials</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Ville</label>
                            <input type="text" name="ville" value="<?= $data['ville']?>" placeholder="Enter City" >
                        </div>
                        <div class="input-field">
                            <label>Quartier</label>
                            <input type="text" name="quartier" value="<?= $data['quartier']?>" placeholder="Enter Neighberhood" >
                        </div>

                        <div class="input-field">
                            <label>Rue</label>
                            <input type="text" name="rue" value="<?= $data['rue']?>"  placeholder="Enter ur Street" >
                        </div>

                        <div class="input-field">
                            <label>Code Postal</label>
                            <input type="text" name="codePostal" value="<?= $data['codePostal']?>" placeholder="Enter Your postal code" >
                        </div>

                        <div class="input-field">
                            <label>email</label>
                            <input type="text" name="email" value="<?= $data['email']?>" placeholder="Enter ur email" >
                        </div>
                        <div class="input-field">
                            <label>Phone</label>
                            <input type="text" name="phone" value="<?= $data['phone']?>" placeholder="Enter your Phone Number">
                        </div>
                          <div class="input-field">
                            <label>Agency</label>
                            <select name="agency" disabled>
                                <option value=""><?= $data['agency'] ?></option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Role</label>
                            <select name="role" disabled>
                                <option value=""><?= $data['role'] ?></option>
                               
                            </select>
                        </div>
                      
                    </div>

                    <button class="nextBtn">
                        <span class="btnText">Submit</span>
                        <i class="uil uil-navigator"></i>
                    </button>

                    
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

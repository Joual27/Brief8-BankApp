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
        <header>Add User Form</header>

        <form action="" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Username</label>
                            <input type="text" name="username" placeholder="Enter your name" >
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter Your Password" >
                        </div>

                        <div class="input-field">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm" placeholder="Confirm your password" >
                        </div>
                        
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Adress Credentials</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Ville</label>
                            <input type="text" name="ville" placeholder="Enter City" >
                        </div>
                        <div class="input-field">
                            <label>Quartier</label>
                            <input type="text" name="quartier" placeholder="Enter Neighberhood" >
                        </div>

                        <div class="input-field">
                            <label>Rue</label>
                            <input type="text" name="rue"  placeholder="Enter ur Street" >
                        </div>

                        <div class="input-field">
                            <label>Code Postal</label>
                            <input type="text" name="codePostal" placeholder="Enter Your postal code" >
                        </div>

                        <div class="input-field">
                            <label>email</label>
                            <input type="text" name="email" placeholder="Enter ur email" >
                        </div>
                        <div class="input-field">
                            <label>Phone</label>
                            <input type="text" name="phone" placeholder="Enter your Phone Number">
                        </div>
                          <div class="input-field">
                            <label>Agency</label>
                            <select name="agency">
                                <option value="">Select Your agency</option>
                                <?php  foreach($data["agencies"] as $agency){
                                    echo " 
                                       <option value = '$agency->agencyID'>$agency->ville : $agency->quartier</option>
                                    ";
                                } ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Role</label>
                            <select name="role">
                                <option value="">select your role</option>
                                <option value="admin">admin</option>
                                <option value="client">client</option>
                                <option value="sub_admin">sub admin</option>
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

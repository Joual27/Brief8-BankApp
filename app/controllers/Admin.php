<?php




class Admin extends Controller{



    public function dashboard(){
        $db = new Database();
        $statsService = new StatsServiceImp($db);
        $data = [
            "totalClients" => $statsService->totalClients(),
            "totalAccounts" => $statsService->totalAccounts(),
            "totalTransactions" => $statsService->totalTransactions(),
            "overallBalance" => $statsService->overallMoney()
        ];

        $this->view("admin/dashboard",$data);
    }

    public function userDashboard(){
        $db = new Database();
        $userService = new UserServiceImp($db);
        $users = $userService->getAllUsers();
        $data = [
            "users" => $users
        ];
        $this->view("admin/userDashboard",$data);
    }

    public function addUser(){

        $db = new Database();
        $agencyService = new AgencyService($db);
        
        $agencies = $agencyService->getAllAgencies();

        $data = [
         "error" => "",
         "agencies" => $agencies
        ];
            
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $confirm_pw = $_POST["confirm"];
            $ville = $_POST["ville"];
            $quartier = $_POST["quartier"];
            $rue = $_POST["rue"];
            $codePostal = $_POST["codePostal"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $role = $_POST["role"];
            $agencyId = $_POST["agency"];

            if(empty($username) ||empty($password) || empty($confirm_pw) || empty($ville) || empty($quartier) || empty($rue) || empty($codePostal) ||empty($email) || empty($phone)  ){
                $data["error"] = "All Fields are required " ;
            }
            else if($password !== $confirm_pw ){
                $data["error"] = "Password doesn't match try again !" ;
            }
            else{
                $userId = uniqid();
                $adrId = uniqid();
                $adress = new Adress();
                $adress->setAddressId($adrId);
                $adress->setVille($ville);
                $adress->setQuartier($quartier);
                $adress->setRue($rue);
                $adress->setCodePostal($codePostal);
                $adress->setEmail($email);
                $adress->setPhone($phone);

                $agency = new Agency();
                $agency->setAgencyId($agencyId);

                $userService = new UserServiceImp($db);
                $user = new AppUser();
                $user->setUserId($userId);
                $user->setUsername($username);
                $user->setPassword($password);
                $user->setAdress($adress);
                $user->setAgency($agency);

                try{
                    $userService->addUser($user,$role);
                    header("Location:".URLROOT."/admin/userDashboard");
                }
                catch(PDOException $e){
                    die($e->getMessage());
                }

            }
        }

        $this->view("admin/addUser",$data);
    }
    
    public function editUser(){
      
        $id = $_GET["id"];
        $db = new Database();
        $userService = new UserServiceImp($db);

        if($_SERVER["REQUEST_METHOD"] == "GET"){
            try{
              $user = $userService->getUserById($id);
              
              $data = [
                "username" => $user->username,
                "codePostal" =>$user->codePostal,
                "phone"=>$user->phone,
                "email"=>$user->email,
                "ville" => $user->ville,
                "quartier" => $user->quartier,
                "rue" => $user->rue,
                "role" => $user->roleName,
                "agency" => $user->agencyID
              ];
 
            }
            catch(PDOException $e){
               die($e->getMessage());
            }
        }
        else if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = [
                "error" => ""
            ];

            $ville = $_POST["ville"];
            $quartier = $_POST["quartier"];
            $rue = $_POST["rue"];
            $codePostal = $_POST["codePostal"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
          
            if(empty($ville) || empty($quartier) || empty($rue) || empty($codePostal) ||empty($email) || empty($phone)  ){
                $data["error"] = "All Fields are required " ;
            }
            else{
                $adress = new Adress();
                $adress->setVille($ville);
                $adress->setQuartier($quartier);
                $adress->setRue($rue);
                $adress->setCodePostal($codePostal);
                $adress->setEmail($email);
                $adress->setPhone($phone);

                $agency = new Agency();
                $userService = new UserServiceImp($db);
                $userToUpdate = new AppUser();
               
                $userToUpdate->setAdress($adress);

                try{
                    $userService->updateUser($userToUpdate);
                    header("Location:".URLROOT."/admin/userDashboard");
                }
                catch(PDOException $e){
                    die($e->getMessage());
                }

            }
        }
        $this->view("admin/editUser",$data);
    }
    public function deleteUser(){
        $id = $_GET["id"];
        $userId =  $_GET["userId"];

        $db = new Database();
        $userService = new UserServiceImp($db);
        try{
           
            $userService->deleteUser($id,$userId);
            header("Location:".URLROOT."/admin/userDashboard");

        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function banksDashboard(){
        $db = new Database();
        $bankService = new BankService($db);
        $data = [
           "banks" => $bankService->getAllBanks()
        ]; 
        $this->view("admin/banksDashboard",$data);
    }


    public function addBank(){
        
        $imagesStorer = $_SERVER["DOCUMENT_ROOT"]."/bank-app-extension/public/pics/banks/";
        $db = new Database();
        $bankService = new BankService($db);

        $data = [
            "error" => ""
        ];


        if($_SERVER["REQUEST_METHOD"] == "POST" ){
            $id = uniqid();
            $name = $_POST["bankName"];
            
        
            if(empty($name) || empty($_FILES["logo"]["name"])){
                $data["error"] = "pls fill both datas";
            }
            else{
                $fileName = basename($_FILES["logo"]["name"]);
                $placement = $imagesStorer.$fileName;
                $fileType = pathinfo($placement,PATHINFO_EXTENSION);
        
                $allowedTypes = array("jpg","png","jpeg");
        
                if(in_array($fileType,$allowedTypes)){
                   
                    if(move_uploaded_file($_FILES["logo"]["tmp_name"],$placement)){
                       $newBank = new Bank();
                       $newBank->setBankId($id);
                       $newBank->setBankName($name);
                       $newBank->setlogo($fileName);
                       
                       try{
                        $bankService->addBank($newBank);
                        header("Location:".URLROOT."/admin/banksDashboard");
                        // Redirect("dashboard.php",false);
                       }
                       catch(PDOException $e){
                        die($e->getMessage());
                       }
                    }
                    else{
                        $data["error"] = "upload failed . TRY AGAIN !";
                    }
                }
                else{
                    $data["error"] = "only JPG , JPEG OR PNG are allowed";
                }
            }
        
         }
        $this->view("admin/addBank",$data);   
    }

    public function deleteBank(){
        $id = $_GET["id"];
        $db = new Database();
        $bankService = new BankService($db);
        try{
            $bankService->deleteBank($id);
            header("Location:".URLROOT."/admin/banksDashboard");
        }

        catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function accountsDashboard(){
        $db = new Database();
        $accountService = new AccountServiceImp($db);
        try{
            $accounts = $accountService->getAllAccounts();
            $data =[
                "accounts" => $accounts
            ];
        }
        catch(PDOException $e){
            die($e->getMessage());
        }

        $this->view("admin/accountsDashboard",$data);
    }

    public function addAccount(){
        $db = new Database();
        $userService = new UserServiceImp($db);
        $users = $userService->getAllUsers();
        $data = [
            "users" => $users,
            "error" => ""
        ];

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $balance = $_POST["balance"];
            $userId = $_POST["holder"];
            $type = $_POST["type"];

            if(empty($balance) || empty($userId) || empty($type)){
                $data["error"] = "all fields are required !";
            }
            else {
                if($type == "main"){
                    $accountService = new AccountServiceImp($db);
                    $id = uniqid();
                    $rib = $accountService->generateRib();
                    $holder = new AppUser();
                    $holder->setUserId($userId);

                    $account = new Account();
                    $account->setAccountId($id);
                    $account->setBalance($balance);
                    $account->setRIB($rib);
                    $account->setAppUser($holder);
                    try{
                        $accountService->addAccount($account);
                        header("Location:".URLROOT."/admin/accountsDashboard");
                    }
                    catch(PDOException $e){
                        die($e->getMessage());
                    }

                }
                else if($type == "active"){
                    $activeAccountService = new Active_AccountImp($db);
                    $id = uniqid();
                    $rib = $activeAccountService->generateRib();
                    $holder = new AppUser();
                    $holder->setUserId($userId);

                    $account = new Active_Account();
                    $account->setAccountId($id);
                    $account->setBalance($balance);
                    $account->setRIB($rib);
                    $account->setAppUser($holder);
                    try{
                        $activeAccountService->addAccount($account);
                        header("Location:".URLROOT."/admin/accountsDashboard");
                    }
                    catch(PDOException $e){
                        die($e->getMessage());
                    }
                }
            }
        }


       
        $this->view("admin/addAccount",$data);
    }

}

?>
<?php
    

    class Pages extends Controller{


        public function __construct()
        {
           
        }

        public function index(){
          $this->view("pages/index");
        }

        public function about() {
            $data = [
                'title' => 'About us' 
            ];
            $this->view('pages/about' , $data);
            
        }

        public function login(){
           
            $data = [
            "error" => "",
            "usernameError" => "",
            "pwError" => ""
           ];
            
            
            if(isset($_POST["submit"])){
                $username = $_POST["username"];
                $pw = $_POST["pw"];
                
                if(empty($username) || empty($pw)){
                    $data["error"] = "Pls fill all the fields";
                    // $this->view("pages/login",$data);
                } 
                else {
                    if(strlen($username) < 8){
                       $data["usernameError"] = "Username must contain at least 8 chars";
                    } elseif(!validatePw($pw)){
                       $data["pwError"] = "Pw must contain at lest 8 chars, an upper case , numbers and symbols";
                        
                    } else {
                        $db = new Database();
                        $loginService = new LoginServiceImp($db);
                        if($loginService->login($username, $pw)){
                            $roleOfUser = $loginService->checkRole($username);
                            $_SESSION["roleName"] = $roleOfUser;
                            $_SESSION["username"] = $username;
                            if($roleOfUser == "client"){
                              header("location:".URLROOT."/client/dashboard");
                            }
                            else{
                              header("location:".URLROOT."/admin/dashboard");
                            } 
                        } 
                        else {
                            $data["error"] = "invalid credentials";
                            $_SESSION["roleName"] = "";
                            $_SESSION["username"] = "";
                        }
            }
        }
      } 
      $this->view("pages/login", $data);

    }
  }
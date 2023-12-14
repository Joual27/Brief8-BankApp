<?php




class AppUser extends Controller{


    public function __construct()
    {
        
    }

    public function dashboard(){
       $this->view('appUser/dashboard');
    }

    public function about(){

    }
}

?>
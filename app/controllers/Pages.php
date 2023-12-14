<?php

    class Pages extends Controller{


        public function __construct()
        {
           
        }
        public function dashboard() {
            $data = [
                'title' => 'You Welcomee to Our Website',
            ];
            
            $this->view('pages/index' , $data );
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
                "username" => "",
                "role" => "",
            ];
            $this->view("pages/login",$data);
        }
    }
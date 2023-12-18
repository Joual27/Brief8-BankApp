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
}

?>
<?php
class adminLogin extends Controller{
    public function __construct()
    {
        $this->model = $this->model("admin");
    }

    public function index(){
        $this->view("admin/login");
    }

    public function login(){
        if($_SERVER["REQUEST_METHOD"] !== "POST") {
            header("Location: " . url("adminLogin/login"));
            die();
        }
        $username = $_POST["username"];
        $password = $_POST["password"];
        $admin = $this->model->get_admin($username, $password);
        if(count($admin) <= 0) {
            header("Location: " . url("adminLogin"));
            die();
        }
        session_start();
        $admin = $admin[0];
        $_SESSION["adminId"] = $admin["adminId"];
        header("Location: " . url("flights"));
    }

    public function logout(){
        session_start();
        unset($_SESSION["adminId"]);
        header("Location: " . url("adminLogin"));
    }
    
}
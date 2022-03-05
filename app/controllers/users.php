<?php

class Users extends Controller{
    public function __construct()
    {
        $this->model = $this->model("User");
    }

    public function index(){
        $this->view("/users/index");
    }

    public function login(){
        if($_SERVER["REQUEST_METHOD"] !== "POST"){
            header("Location: " . url("users"));
            die();
        }
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $user = $this->model->get_uesr_by_email_password([$email, $pass]);
        if(count($user) <= 0){
            header("Location: " . url("users"));
            die();
        }
        session_start();
        $_SESSION["userId"] = $user[0]["userId"];
        // header("Location: " . url("home"));
    }

    public function register(){
        if($_SERVER["REQUEST_METHOD"] !== "POST"){
            $this->view("/users/register");
            die();
        }
        try{
            $first = $_POST["first"];
            $last = $_POST["last"];
            $birthdate = $_POST["birthdate"];
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            $data = [$first,$last, $email, $pass, $birthdate];
            $this->model->add_user($data);
            $this->view("/users/index");
        }
        catch(Exception $e){
            echo "<pre>";
            echo $e->getMessage();
        }
    }
}
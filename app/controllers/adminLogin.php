<?php
class adminLogin extends Controller{
    public function __construct()
    {
        $this->model = $this->model("adminLogin");
    }
    public function index(){
        $this->view("adminLogin");
    }
}
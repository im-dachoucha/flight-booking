<?php

class Users extends Controller{
    public function __construct()
    {
        $this->model = $this->model("User");
    }

    public function index(){
        $this->view("/users/index");
    }
}
<?php
class Bookings extends Controller{
    public function __construct()
    {
        $this->model = $this->model("Booking");;
    }
    
    public function book(){
        if($_SERVER["REQUEST_METHOD"] !== "POST"){
            header("Location: " . url("home"));
            die();
        }
        session_start();
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $trip = $_POST["trip"];
        $flight1 = $_POST["f1"];
        if($trip == "round") $flight2 = $_POST["f2"];
        $seats = $_POST["seats"];
        $birthdate = $_POST["birthdate"];
        $userId = $_SESSION["userId"];
        
        for($i = 0; $i < $seats; $i++){
            $params = [$flight1, $userId, $firstname[$i], $lastname[$i], $birthdate[$i]];
            $this->model->book($params);
        }
        if(isset($flight2)){
            for($i = 0; $i < $seats; $i++){
                $params = [$flight2, $userId, $firstname[$i], $lastname[$i], $birthdate[$i]];
                $this->model->book($params);
            }   
        }
    }
}
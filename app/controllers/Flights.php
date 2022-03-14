<?php
class Flights extends Controller{
    public function __construct(){
        $this->model = $this->model("Flight");
    }

    public function index(){
        $flights = $this->model->get_all_flights();
        $data = ["flights" => $flights, "title" => "all flights"];
        $this->view("flights/showflights", $data);
    }

    public function single($id = null){
        if($id ===  null) $this->index();
        else{
            $flight = $this->model->get_flight($id);
            $data = ["flight" => $flight, "title" => "single flight"];
            $this->view("flights/single", $data);
        }
    }

    public function new(){
        $data = ["title" => "add new flight"];
        $this->view("flights/new", $data);
    }

    public function add(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $departureAirport = $_POST["departureAirport"];
            $arrivalAirport = $_POST["arrivalAirport"];
            $departureDate = $_POST["departureDate"];
            $arrivalDate = $_POST["arrivalDate"];
            $nbrSeats = $_POST["nbrSeats"];
            $price = $_POST["price"];
            
            $values = [$departureDate,$arrivalDate,$departureAirport,$arrivalAirport,$nbrSeats,0,$price];
            $this->model->add_flight($values);
            
            // echo $departureAirport . "<br>";
            // echo $arrivalAirport . "<br>";
            // echo $departureDate . "<br>";
            // echo $arrivalDate . "<br>";
            // echo $nbrSeats . "<br>";
            // echo $price . "<br>";
        }
        header("Location: " . url("flights"));
        die();
    }

    public function delete(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $id = $_POST["id"];
            $this->model->delete_flight($id);
        }
        header("Location: " . url("flights"));
        die();
    }
    public function edit(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $id = $_POST["id"];
            $flight = $this->model->get_flight($id);
            $data = ["flight" => $flight, "title" => "edit flight"];
            $this->view("flights/edit", $data);
        }
    }
    public function update(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $departureAirport = $_POST["departureAirport"];
            $arrivalAirport = $_POST["arrivalAirport"];
            $departureDate = $_POST["departureDate"];
            $arrivalDate = $_POST["arrivalDate"];
            $nbrSeats = $_POST["nbrSeats"];
            $price = $_POST["price"];
            $id = $_POST["id"];
            
            $values = [$departureDate,$arrivalDate,$departureAirport,$arrivalAirport,$nbrSeats,$price,$id];
            $this->model->edit_flight($values);
        }
        header("Location: " . url("flights"));
        die();
    }
    public function search_flights(){
        if($_SERVER["REQUEST_METHOD"] !== "GET"){
            header("Location: " . url("home"));
            die();
        }
        $trip = $_GET["trip"];
        $from = $_GET["from"];
        $to = $_GET["to"];
        $departure = $_GET["departure"];
        $return = $_GET["return"];
        $seats = $_GET["seats"];

        $res1 = $this->model->search_flights([$from, $to, $departure, $seats]);
        if(count($res1) <= 0){
            $this->view("flights/search", ["title" => "search flights", "error" => "no flight was found!!!"]);
        }
        elseif($trip === "round"){
            $res2 = $this->model->search_flights([$to, $from, $return, $seats]);
            if(count($res2) <= 0){
                $this->view("flights/search", ["title" => "search flights", "error" => "no flight was found!!!"]);
            }
            else $this->view("flights/search", ["title" => "search flights", "res1" => $res1, "res2" => $res2, "trip" => $trip, "seats" => $seats]);
        }else{
            $this->view("flights/search", ["title" => "search flights", "res1" => $res1, "trip" => $trip, "seats" => $seats]);
        }

    }

    public function reserve_seats(){
        if($_SERVER["REQUEST_METHOD"] !== "POST"){
            header("Location: " . url("home"));
            die();
        }
        $flight1 = $_POST["f1"];
        $flight2 = isset($_POST["f2"]) ? $_POST["f2"] : "";
        $trip = $_POST["trip"];
        $seats = $_POST["seats"];

        $this->view("flights/reserve_seats", ["title" => "reserve seats", "flight1" => $flight1, "flight2" => $flight2, "trip" => $trip, "seats" => $seats]);
        
    }
}
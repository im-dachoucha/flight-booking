<?php
class Flight extends Model{
    public function __construct($table = "flight", $primaryKey = "flightId"){
        parent::__construct();
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    public function get_all_flights(){
        return $this->execute("SELECT * FROM " . $this->table);
    }

    public function get_flight($id){
        return $this->execute("SELECT * FROM " . $this->table . " WHERE " . $this->primaryKey . " = ?" , [$id]);
    }

    public function add_flight($values){
        echo "<pre>";
        // print_r($values);
        // return;
        return $this->execute("INSERT INTO `" . $this->table . "` (`departureDate`, `arrivalDate`, `departureAirport`, `arrivalAirport`, `nbrSeats`, `nbrSeatsReserved`, `price`) VALUES(?,?,?,?,?,?,?)", $values);
    }

    public function delete_flight($id){
        $this->execute("DELETE FROM " . $this->table . " WHERE " . $this->primaryKey . " = ?" , [$id]);
    }

    public function edit_flight($values){
        $this->execute("UPDATE `" . $this->table . "` SET `departureDate` = ?, `arrivalDate` = ?, `departureAirport` = ?, `arrivalAirport` = ?, `nbrSeats` = ?, `price` = ? WHERE `" . $this->primaryKey . "` = ?", $values);
    }

    public function search_flights($values){
        return $this->execute("SELECT * FROM `" . $this->table . "` WHERE `departureAirport` LIKE ? AND `arrivalAirport` LIKE ? AND  `arrivalDate` >= ? AND `nbrSeats` - `nbrSeatsReserved` >= ?", $values);
    }
}
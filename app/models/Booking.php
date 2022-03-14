<?php
class Booking extends Model{
     public function __construct($table = "booking", $primaryKey = "bookingId"){
        parent::__construct();
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    public function book($values){
        $this->execute("INSERT into `{$this->table}`(`flightId`, `userId`, `firstName`, `lastName`, `birthDate`) values (?, ?, ?, ?, ?)", $values);
        $this->execute("UPDATE `flight` set `nbrSeats` = `nbrSeats` - 1, `nbrSeatsReserved` = `nbrSeatsReserved` + 1 where `flightId` = ?", [$values[0]]);
    }
}
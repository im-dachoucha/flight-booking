<?php
class Booking extends Model{
     public function __construct($table = "booking", $primaryKey = "bookingId"){
        parent::__construct();
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    public function get_user_bookings($id){
        return $this->execute("SELECT
                                    `b`.`firstName`,
                                    `b`.`lastName`,
                                    `b`.`birthDate`,
                                    `b`.`bookingDate`,
                                    `f`.`departureDate`,
                                    `f`.`arrivalDate`,
                                    `f`.`departureAirport`,
                                    `f`.`arrivalAirport`,
                                    `f`.`price`
                                FROM
                                    `booking` `b`
                                JOIN `flight` `f`
                                    ON
                                        f.flightId = b.flightId
                                WHERE
                                    `b`.`userId` = ?", [$id]);
    }

    public function book($values){
        $this->execute("INSERT into `{$this->table}`(`flightId`, `userId`, `firstName`, `lastName`, `birthDate`) values (?, ?, ?, ?, ?)", $values);
        $this->execute("UPDATE `flight` set `nbrSeats` = `nbrSeats` - 1, `nbrSeatsReserved` = `nbrSeatsReserved` + 1 where `flightId` = ?", [$values[0]]);
    }
}
<?php
class admin extends Model{
    public function __construct($table = "admin", $primaryKey = "adminId")
    {
        parent::__construct();
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    public function get_admin($username, $password){
        return $this->execute("SELECT * FROM `admin` WHERE `username` LIKE '$username' AND `password` = '$password'");
    }
}
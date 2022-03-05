<?php
class User extends Model{
    public function __construct($table = "user", $primaryKey = "userId"){
        parent::__construct();
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    public function get_user_by_id($id){
        return $this->execute("SELECT * FROM user WHERE " . $this->primaryKey . " = ?", [$id]);
    }

    public function get_uesr_by_email_password($values){
        return $this->execute("SELECT * FROM user WHERE email like ? AND password = ?", $values);
    }

    public function add_user($values){
        return $this->execute("INSERT INTO `" . $this->table . "`(`firstName`, `lastName`, `email`, `password`, `birthDate`) VALUES (?,?,?,?,?)", $values);
    }
}
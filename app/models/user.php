<?php
class User extends Model{
    public function __construct($table = "user", $primaryKey = "userId"){
        parent::__construct();
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    public function get_user($id){
        echo "<pre>";
        var_dump($this->execute("SELECT * FROM user WHERE " . $this->primaryKey . " = ?", [$id]));
    }
}
<?php

require_once '../config/connect.php';
class Quiz{
    private $db;

    public function __construct(){
        return $this->db = new DatabaseConection();
    }
    public function SelectQuestion(){
        $requet = $this->db->prepare('SELECT * FROM question ');
        $requet->execute();

        return   $requet->fetchAll(PDO::FETCH_ASSOC);
    }

}
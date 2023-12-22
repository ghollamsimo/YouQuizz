<?php

require_once 'config/connect.php';
class Person{
    private $db;

    public function __construct(){
        return $this->db = new DatabaseConection();
    }

    public function SelectQuestion(){
        $requet = $this->db->prepare('SELECT Question FROM question')->fetchAll(PDO::FETCH_OBJ);
        return $requet;
    }

}
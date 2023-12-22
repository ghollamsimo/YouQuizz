<?php

require_once '../config/connect.php';
class Crud{
    private $db;
    protected $tablename;
    protected $All = ['*'];
    public function __construct(){
        return $this->db = new DatabaseConection();
    }

    protected function FetchAll()
    {
        $request = $this->db->prepare("SELECT " . implode(', ', $this->All) . " FROM {$this->tablename}");
        $request->execute();

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }
}
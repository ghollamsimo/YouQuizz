<?php

require_once '../config/connect.php';
class Crud{
    private $db;
    protected $tablename;
    protected $All = ['*'];
    public function __construct(){
        return $this->db = new DatabaseConection();
    }

    protected function FetchQuestion()
    {
        $request = $this->db->prepare("SELECT " . implode(', ', $this->All) . " FROM {$this->tablename} ORDER BY RAND() LIMIT 1");
        $request->execute();

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }
    protected function FetchAnswers()
    {
        $request = $this->db->prepare("SELECT " . implode(', ', $this->All) . " FROM {$this->tablename} ");
        $request->execute();

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }
}
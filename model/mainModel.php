<?php

require_once '../config/connect.php';

class Crud
{
    private $db;
    private $tablename;
    private $All = ['*'];

    public function __construct($tablename)
    {
        $this->db = new DatabaseConection();
        $this->tablename = $tablename; // Add this line
    }

    public function __set($property, $value)
    {
        $this->$property = $value; // Fix the typo here
    }

    public function __get($property)
    {
        return $this->$property;
    }

//    protected function FetchQuestion()
//    {
//        $request = $this->db->prepare("SELECT DISTINCT " . implode(', ', $this->All) . " FROM {$this->tablename} ORDER BY RAND() LIMIT 1");
//        $request->execute();
//
//        return $request->fetchAll(PDO::FETCH_ASSOC);
//    }
    protected function fetchRandom(){
        $request = $this->db->prepare("SELECT " . implode(', ', $this->All) . " FROM question order by rand() limit 1");
        $request->execute();
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    protected function FetchAnswersMain($questionId)
    {
        $request = $this->db->prepare("SELECT " . implode(', ', $this->All) . " FROM answers  where idquestion = :questionid");
        $request->bindParam(':questionid', $questionId);
        $request->execute();

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }
}
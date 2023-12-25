<?php
require_once 'mainModel.php';
class Question extends Crud {
    private $questionId;
    private $questionText;
    private $questionDescription;
    private $answersArray;
    public function __set($property, $value)
    {
        $this->$property = $value; // Fix the typo here
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function index() {
        echo "hello world";
    }

    public function __construct(){
        parent::__construct("question");
//        $this->tablename = "answers";
    }
    public function fetchQuestions(){
        $row = $this->fetchRandom();
        $this->questionId = $row["Idquestion"];
        $this->questionText = $row["Question"];
    }
    public function fetchAnswers(){
        $row = $this->FetchAnswersMain($this->questionId);
        $this->answersArray = $row;
    }

}
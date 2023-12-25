<?php
require_once '../model/questionModel.php';
//print_r ($question->__get("answersArray"));

class questionController {
//    public function index() {
//        $array = [
//            "test" => "hello"
//        ];->fetchAnswers();
//
//        echo json_encode($array);
//    }

    private $questionModelObject;
    public function __construct()
    {
        $this->questionModelObject = new Question();
    }
    public function prepareObject(){
        $this->questionModelObject->fetchQuestions();
        $this->questionModelObject->fetchAnswers();
        return [
            "questionId" => $this->questionModelObject->__get("questionId"),
            "quesionText"=> $this->questionModelObject->__get("questionText"),
            "questionDescription" => $this->questionModelObject->__get("questionDescription"),
            "answersArray"=>$this->questionModelObject->__get("answersArray")
        ];
    }

}
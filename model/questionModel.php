<?php
require_once 'mainModel.php';
class Quiz extends Crud {

    public function __construct(){
        parent::__construct();
        $this->tablename = 'question';
//        $this->tablename = "answers";
    }
    public function SelectQuestion(){
      return $this->FetchQuestion();
    }
//    public function SelectAnswers(){
//        return $this->FetchAnswers();
//    }

}
<?php

require_once '../config/connect.php';

class reponseModel{
    private $db;
    private $id_question;

    public function __construct() {
        $this->db = new DatabaseConection();
    }

    public function get() {
        return $this->id_question;
    }


    public function set($id_question) {
        $this->id_question = $id_question;
    }

    public function selectResponse() {
        $idQuestion = $this->get();
        $correctResponse = $this->correctResponse();
        $Responses = "SELECT Answer FROM answers  WHERE Idquestion = :id_question";
        $querystmt = $this->db->prepare($Responses);
        $querystmt->bindParam(':id_question', $idQuestion);
        $querystmt->execute();
        $responses = $querystmt->fetchAll(PDO::FETCH_ASSOC);

        $formattedResponses = [];
        foreach ($responses as $response) {
            $formattedResponses[] = [
                'Answer' => $response['Answer'],
                'correct' => $response['Answer'] == $correctResponse,
            ];
        }


        return $formattedResponses;
    }

    public function correctResponse() {
        $idQuestion = $this->get();
        $sql = "SELECT Answer FROM question JOIN answers ON question.Idanswer = question.Idanswer WHERE question.Idquestion = :idquestion";
        $correctResponseQuery = $this->db->prepare($sql);
        $correctResponseQuery->bindParam(':idquestion', $idQuestion);
        $correctResponseQuery->execute();

        $correctResponse = $correctResponseQuery->fetch(PDO::FETCH_ASSOC);

        if ($correctResponse) {
            return $correctResponse['Answer'];
        } else {
            return null;
        }
    }

}
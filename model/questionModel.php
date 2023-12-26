<?php
require_once '../config/connect.php';
require_once 'reponseModel.php';

class Question
{
    private $db;
    private $id_question;

    public function __construct()
    {
        $this->db = new DatabaseConection();
    }

    public function get()
    {
        return $this->id_question;
    }

    public function set($id_question)
    {
        $this->id_question = $id_question;
    }

    public function selectQuestions()
    {
        try {
            $Question = "SELECT * FROM question ORDER BY RAND()";
            $querystmt = $this->db->prepare($Question);
            $querystmt->execute();
            $questions = $querystmt->fetchAll(PDO::FETCH_ASSOC);

            $formattedQuestions = [];
            foreach ($questions as $question) {
                $reponse = new reponseModel();
                $reponse->set($question['Idquestion']);

                $formattedQuestion = [
                    'question_text' => $question['Question'],
                    'Answer' => $reponse->selectResponse()
                ];
                $formattedQuestions[] = $formattedQuestion;
            }
            return $formattedQuestions;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getQuestionsJson()
    {
        $formattedQuestions = $this->selectQuestions();
        return json_encode($formattedQuestions);
    }
}

$question = new Question();
echo $question->getQuestionsJson();

<?php

require_once '../config/connect.php';
class theme {
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

    public function getTheme() {
        $idQuestion = $this->get();
        $sqlThemes = "SELECT * FROM theme JOIN question ON theme.Idtheme = question.Idtheme  where Idquestion = :id_question";
        $queryThemes = $this->db->prepare($sqlThemes);
        $queryThemes->bindParam(':id_question', $idQuestion);
        $queryThemes->execute();
        $themes = $queryThemes->fetch(PDO::FETCH_ASSOC);
        return $themes['theme'];

    }
}
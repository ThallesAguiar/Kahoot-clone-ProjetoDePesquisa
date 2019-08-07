<?php
class pergunta_quizVO {

    private $id_pergunta_quiz;
    private $id_pergunta;
    private $id_quiz;
	private $id_turma;
	
    function getId_pergunta_quiz() {
        return $this->id_pergunta_quiz;
    }

    function getId_pergunta() {
        return $this->id_pergunta;
    }

    function getId_quiz() {
        return $this->id_quiz;
    }

    function getId_turma() {
        return $this->id_turma;
    }
	
	function setId_pergunta_quiz($id_pergunta_quiz) {
        $this->id_pergunta_quiz = $id_pergunta_quiz;
    }

    function setId_pergunta($id_pergunta) {
        $this->id_pergunta = $id_pergunta;
    }

    function setId_quiz($id_quiz) {
        $this->id_quiz = $id_quiz;
    }
	
	function setId_turma($id_turma) {
        $this->id_turma = $id_turma;
    }

   

}

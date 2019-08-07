<?php

class turma_quizVO {

    private $id_turma_quiz;
    private $id_quiz;
    private $id_turma;

    function getId_turma_quiz() {
        return $this->id_turma_quiz;
    }

    function getId_quiz() {
        return $this->id_quiz;
    }

    function getId_turma() {
        return $this->id_turma;
    }

    function setId_turma_quiz($id_turma_quiz) {
        $this->id_turma_quiz = $id_turma_quiz;
    }

    function setId_quiz($id_quiz) {
        $this->id_quiz = $id_quiz;
    }

    function setId_turma($id_turma) {
        $this->id_turma = $id_turma;
    }



}

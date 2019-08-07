<?php

class turma_alunoVO {

    private $id_turma_aluno;
    private $id_turma;
    private $id_usuario;
    
    function getId_turma_aluno() {
        return $this->id_turma_aluno;
    }

    function setId_turma_aluno($id_turma_aluno) {
        $this->id_turma_aluno = $id_turma_aluno;
    }

    function getId_turma() {
        return $this->id_turma;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function setId_turma($id_turma) {
        $this->id_turma = $id_turma;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

}

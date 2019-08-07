<?php

class turmaVO {

    private $id_turma;
    private $ano;
    private $semestre;
    private $nome;
    private $sigla;
    private $id_usuario;
    private $id_disciplina;

    function getId_turma() {
        return $this->id_turma;
    }

    function getAno() {
        return $this->ano;
    }

    function getSemestre() {
        return $this->semestre;
    }

    function getNome() {
        return $this->nome;
    }

    function getSigla() {
        return $this->sigla;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getId_disciplina() {
        return $this->id_disciplina;
    }

    function setId_turma($id_turma) {
        $this->id_turma = $id_turma;
    }

    function setAno($ano) {
        $this->ano = $ano;
    }

    function setSemestre($semestre) {
        $this->semestre = $semestre;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSigla($sigla) {
        $this->sigla = $sigla;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setId_disciplina($id_disciplina) {
        $this->id_disciplina = $id_disciplina;
    }

}

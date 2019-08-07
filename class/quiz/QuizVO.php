<?php

class QuizVO {

    private $id_quiz;
    private $id_usuario;
    private $id_sala;
    private $pergunta;
    private $tempo;
    private $resposta_correta;
    private $resposta_um;
    private $resposta_dois;
    private $resposta_tres;
    private $resposta_quatro;
    private $imagem_quiz;
    
    function getId_quiz() {
        return $this->id_quiz;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getId_sala() {
        return $this->id_sala;
    }

    function getPergunta() {
        return $this->pergunta;
    }

    function getTempo() {
        return $this->tempo;
    }

    function getResposta_correta() {
        return $this->resposta_correta;
    }

    function getResposta_um() {
        return $this->resposta_um;
    }

    function getResposta_dois() {
        return $this->resposta_dois;
    }

    function getResposta_tres() {
        return $this->resposta_tres;
    }

    function getResposta_quatro() {
        return $this->resposta_quatro;
    }

    function getImagem_quiz() {
        return $this->imagem_quiz;
    }

    function setId_quiz($id_quiz) {
        $this->id_quiz = $id_quiz;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setId_sala($id_sala) {
        $this->id_sala = $id_sala;
    }

    function setPergunta($pergunta) {
        $this->pergunta = $pergunta;
    }

    function setTempo($tempo) {
        $this->tempo = $tempo;
    }

    function setResposta_correta($resposta_correta) {
        $this->resposta_correta = $resposta_correta;
    }

    function setResposta_um($resposta_um) {
        $this->resposta_um = $resposta_um;
    }

    function setResposta_dois($resposta_dois) {
        $this->resposta_dois = $resposta_dois;
    }

    function setResposta_tres($resposta_tres) {
        $this->resposta_tres = $resposta_tres;
    }

    function setResposta_quatro($resposta_quatro) {
        $this->resposta_quatro = $resposta_quatro;
    }

    function setImagem_quiz($imagem_quiz) {
        $this->imagem_quiz = $imagem_quiz;
    }


   
}

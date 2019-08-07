<?php

class respostaVO {

    private $id_resposta;
    private $resposta;
    private $tipo;
    private $id_pergunta;
    
    function getId_resposta() {
        return $this->id_resposta;
    }

    function getResposta() {
        return $this->resposta;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getId_pergunta() {
        return $this->id_pergunta;
    }

    function setId_resposta($id_resposta) {
        $this->id_resposta = $id_resposta;
    }

    function setResposta($resposta) {
        $this->resposta = $resposta;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setId_pergunta($id_pergunta) {
        $this->id_pergunta = $id_pergunta;
    }


}

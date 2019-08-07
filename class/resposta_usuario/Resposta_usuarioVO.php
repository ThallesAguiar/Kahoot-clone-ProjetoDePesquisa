<?php

class resposta_usuario {

    private $id_resposta_usuario;
    private $id_resposta;
    private $id_usuario;

    function getId_resposta_usuario() {
        return $this->id_resposta_usuario;
    }

    function getId_resposta() {
        return $this->id_resposta;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function setId_resposta_usuario($id_resposta_usuario) {
        $this->id_resposta_usuario = $id_resposta_usuario;
    }

    function setId_resposta($id_resposta) {
        $this->id_resposta = $id_resposta;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

}

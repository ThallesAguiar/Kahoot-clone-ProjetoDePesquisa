<?php

class tipo_usuarioVO {

    private $id_tipo_usuario;
    private $descricao;

    function getId_tipo_usuario() {
        return $this->id_tipo_usuario;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setId_tipo_usuario($id_tipo_usuario) {
        $this->id_tipo_usuario = $id_tipo_usuario;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

}

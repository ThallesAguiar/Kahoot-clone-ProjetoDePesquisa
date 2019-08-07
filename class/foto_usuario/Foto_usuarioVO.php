<?php

class Foto_usuarioVO {

    private $id_foto_usuario;
    private $arquivo;
    private $data;
    
    function getId_foto_usuario() {
        return $this->id_foto_usuario;
    }

    function getArquivo() {
        return $this->arquivo;
    }

    function getData() {
        return $this->data;
    }

    function setId_foto_usuario($id_foto_usuario) {
        $this->id_foto_usuario = $id_foto_usuario;
    }

    function setArquivo($arquivo) {
        $this->arquivo = $arquivo;
    }

    function setData($data) {
        $this->data = $data;
    }


    
    

}

<?php

class UsuarioVO {

    private $id_usuario;
    private $nome;
    private $email;
    private $senha;
    private $id_tipo_usuario;
    private $foto_usuario;
    
    function getId_usuario() {
        return $this->id_usuario;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getId_tipo_usuario() {
        return $this->id_tipo_usuario;
    }

    function getFoto_usuario() {
        return $this->foto_usuario;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setId_tipo_usuario($id_tipo_usuario) {
        $this->id_tipo_usuario = $id_tipo_usuario;
    }

    function setFoto_usuario($foto_usuario) {
        $this->foto_usuario = $foto_usuario;
    }






    


}

<?php

class salaVO {

    private $id_sala;
    private $nome;
    private $senha;
    private $descricao;
    private $visivel;
    private $imagem;
    private $data;
    private $id_usuario;
    
    function getId_sala() {
        return $this->id_sala;
    }

    function getNome() {
        return $this->nome;
    }

    function getSenha() {
        return $this->senha;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getVisivel() {
        return $this->visivel;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getData() {
        return $this->data;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function setId_sala($id_sala) {
        $this->id_sala = $id_sala;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setVisivel($visivel) {
        $this->visivel = $visivel;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }


}

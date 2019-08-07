<?php

class ChatVO {

    private $id_chat;
    private $nome;
    private $mensagem;
    private $data;
    
    function getId_chat() {
        return $this->id_chat;
    }

    function getNome() {
        return $this->nome;
    }

    function getMensagem() {
        return $this->mensagem;
    }

    function getData() {
        return $this->data;
    }

    function setId_chat($id_chat) {
        $this->id_chat = $id_chat;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    function setData($data) {
        $this->data = $data;
    }


}

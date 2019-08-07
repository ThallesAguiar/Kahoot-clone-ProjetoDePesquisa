<?php

class MelhoriasVO {

    private $id_melhoria;
    private $descricao;
    private $email;
    private $dt_solicitacao;
    private $dt_atualizacao;
    private $situacao;
    private $id_usuario;
    
    function getId_melhoria() {
        return $this->id_melhoria;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getEmail() {
        return $this->email;
    }

    function getDt_solicitacao() {
        return $this->dt_solicitacao;
    }

    function getDt_atualizacao() {
        return $this->dt_atualizacao;
    }
	
	function getSituacao() {
        return $this->situacao;
    }
	
	function getIdUsuario() {
        return $this->id_usuario;
    }
    function setId_melhoria($id_melhoria) {
        $this->id_melhoria = $id_melhoria;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setDt_solicitacao($dt_solicitacao) {
        $this->dt_solicitacao = $dt_solicitacao;
    }

    function setDt_atualizacao($dt_atualizacao) {
        $this->dt_atualizacao = $dt_atualizacao;
    }
	
	function setSituacao($situacao) {
        $this->situacao = $situacao;
    }
	
	function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

   
}

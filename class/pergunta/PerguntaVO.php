<?php
class perguntaVO {

    private $id_pergunta;
    private $descricao;
    private $pontuacao;
    private $id_disciplina;
    private $id_categoria;
    private $id_usuario;
    
    function getId_pergunta() {	
		return $this->id_pergunta;    
	}

    function getDescricao() {	
		return $this->descricao;    
	}
	
	function getPontuacao() {	
		return $this->pontuacao;    
	}
	
	function getId_disciplina() {	
		return $this->id_disciplina;    
	}
	
	function getId_categoria() {	
		return $this->id_categoria;    
	}
	
    function getId_usuario() {	
		return $this->id_usuario;    
	}

    function setId_pergunta($id_pergunta) {	
		$this->id_pergunta = $id_pergunta;	
	}

    function setDescricao($descricao) {	
		$this->descricao = $descricao;   
	}

    function setPontuacao($pontuacao) {	
		$this->pontuacao = $pontuacao;    
	}
	
	function setId_disciplina($id_disciplina) {	
		$this->id_disciplina = $id_disciplina;    
	}

	function setId_categoria($id_categoria) {	
		$this->id_categoria = $id_categoria;    
	}

	function setId_usuario($id_usuario) {	
		$this->id_usuario = $id_usuario;    
	}

}

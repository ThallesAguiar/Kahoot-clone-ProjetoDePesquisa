<?php

class CategoriaVO {

    private $id_categoria;
    private $descricao;
    private $menu_pai;
    
    function getId_categoria() {
        return $this->id_categoria;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getMenu_pai() {
        return $this->menu_pai;
    }

    function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setMenu_pai($menu_pai) {
        $this->menu_pai = $menu_pai;
    }


}

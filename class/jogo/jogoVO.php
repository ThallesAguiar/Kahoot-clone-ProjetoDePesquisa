<?php

class jogoVO {

    private $id_jogo;
    private $pin;
    private $id_sala;

    function qtd_Jogadores_Online($qnt_usuario) {
        
        if ($qnt_usuario <= 1) {
            $cont = 0;
            for ($i = 1; $i <= $qnt_usuario; $i++) {

                echo $cont++;
            }
            $quantidade=$cont . ' Player';
        } else {
            $cont = 0;
            for ($i = 1; $i <= $qnt_usuario; $i++) {
                $cont++;
            }
            $quantidade=$cont . ' Players';
        }
        return $quantidade;
    }

    function getId_jogo() {
        return $this->id_jogo;
    }

    function getPin() {
        return $this->pin;
    }

    function getId_sala() {
        return $this->id_sala;
    }

    function setId_jogo($id_jogo) {
        $this->id_jogo = $id_jogo;
    }

    function setPin($pin) {
        $this->pin = $pin;
    }

    function setId_sala($id_sala) {
        $this->id_sala = $id_sala;
    }

}

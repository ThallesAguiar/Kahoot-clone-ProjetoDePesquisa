<?php



if(isset($_GET['sala_espera'])){
    require_once './loading_carregar_sala.php';
   
}elseif (isset($_GET['comecar_jogo'])) {
    require_once './loading_comecar_quiz.php';
}
?>
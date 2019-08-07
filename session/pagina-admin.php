<?php
    session_start();
    echo 'Bem vindo página do Administrador <br>';
    echo 'Nome: '.$_SESSION['UsuarioNome']."<br>"; 
    echo 'Nivel'.$_SESSION['UsuarioNivel']."<br>";
    //echo strtoupper(session_id());
    echo '<a href="testa_sessao.php"> Seguir no sistema</a>';
    
?>


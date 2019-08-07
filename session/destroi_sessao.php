<?php
    session_start();
    
    unset($_SESSION['UsuarioNome']);
    unset($_SESSION['UsuarioNivel']);
    
    session_destroy();
    echo 'sessão finalizada';
    header("Location: ../pagina-inicial/index.html"); exit;
?>


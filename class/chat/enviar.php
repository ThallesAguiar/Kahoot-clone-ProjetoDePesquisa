<?php
session_start();

require_once '../../config/conexao.php';
require_once './ChatDAO.php';
require_once './ChatVO.php';


$nome=$_SESSION['UsuarioNome'];
$mensagem = $_POST['mensagem'];




$chatVO = new ChatVO();
$chatVO->setNome($nome);
$chatVO->setMensagem($mensagem);


$chatDAO = new ChatDAO();

if ($chatDAO->insert($chatVO, $conn) == TRUE) {
    header("Location: index.php");
}
            
        
        
        


        



 

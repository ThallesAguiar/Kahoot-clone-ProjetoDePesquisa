<?php

	session_start();

	require_once '../../config/config.php';
	require_once '../../functions/functions.php';
	require_once '../../class/turma_aluno/turma_alunoDAO.php';
	require_once '../../class/turma_aluno/turma_alunoVO.php';

	$link = conecta_db();

	$turma_alunoVO = new turma_alunoVO();
	
	$turma_alunoVO->setId_turma($_POST['turma']);
	$turma_alunoVO->setId_usuario($_SESSION['UsuarioID']);
	
	$turma_alunoDAO = new turma_alunoDAO();	
	$turma_alunoDAO->insert($turma_alunoVO, $link);

	printf('Registro inserido com sucesso.');

	desconecta_db($link);
?>


<html lang="pt-br">
    </br></br><a href="pagina-painel-jogador/tphe/_aluno.php" class="alert-link">Voltar para a tela administrativa</a>
</html>
<?php

// A sessão precisa ser iniciada em cada página diferente
	if (!isset($_SESSION)) session_start();
	
	$nivel_necessario = 2;
	
	// Verifica se não há a variável da sessão que identifica o usuário
	
	// e verifica o nível do usuário: 1-Administrador 2-Professor 3-Aluno
	if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] == 1)){
		header("Location:../pagina-adm/index.php");
		//header("Location:../pagina-adm/pagina-admin.php");

	} else if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] == 2)){
	
		header("Location: ../pagina-professor/index.php");
	
	} else if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] == 3)){
                header("Location: ../pagina-aluno/index.php");
		//header("Location: pagina-aluno.php");
	}	
	else {
		// Destrói a sessão por segurança
		session_destroy();
		
		// Redireciona o visitante de volta pro login
		header("Location: ../index.html"); exit;
	}
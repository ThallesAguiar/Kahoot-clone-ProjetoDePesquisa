<?php 

	session_start();
	//echo "ID_QUIZ: #".$_POST['quiz']." - TURMA: #".$_POST['turma']." - ALUNO: #".$_SESSION['UsuarioID']; 
	//var_dump($_GET);
	
	$quiz = $_GET['quiz'];
	$turma = $_GET['turma'];
	
	require_once '../../config/conexao.php';
	
	//criando a query de consulta à tabela 
	$query  = "SELECT distinct(`pergunta`.`ID_PERGUNTA`), `pergunta`.`DESCRICAO` as 'TEXTO', `categoria`.`DESCRICAO` ";
	$query .= " FROM `pergunta`, `pergunta_quiz`,`categoria` ";
	$query .= " WHERE `pergunta`.`ID_PERGUNTA` = `pergunta_quiz`.`ID_PERGUNTA` ";
	$query .= " AND `pergunta`.`ID_CATEGORIA` = `categoria`.`ID_CATEGORIA`";
	$query .= " AND `pergunta_quiz`.`ID_PERGUNTA` in (SELECT `ID_PERGUNTA` FROM `pergunta_quiz` where `ID_QUIZ`=".$quiz;
	$query .= " and `ID_TURMA`=".$turma.") ";
		
	//echo $query;	
	
	// Pegar a página atual por GET
	//$p = $_GET["p"];

	// Verifica se a variável tá declarada, senão deixa na primeira página como padrão
	if(isset($p)) {
	$p = $p;
	} else {
	$p = 1;
	} 

	// Defina aqui a quantidade máxima de registros por página.
	$qnt = 2;

	// O sistema calcula o início da seleção calculando: 
	// (página atual * quantidade por página) - quantidade por página
	$inicio = ($p*$qnt) - $qnt;

	// Seleciona no banco de dados com o LIMIT indicado pelos números acima
	$old_query = $query;
	$query .= " limit $inicio,$qnt";
	
	
	$sql = mysqli_query($cx, $query) or die(mysqli_error($cx)); //caso haja um erro na consulta

	// Cria um while para pegar as informações do BD
	while($aux = mysqli_fetch_assoc($sql)) {
		//percorrendo os registros da consulta.									

		echo "<h2>".$aux['TEXTO']."</h2>"; 
	
		//criando a query de consulta à tabela 
		$queryResp  = "SELECT `ID_RESPOSTA`, `RESPOSTA`, `TIPO`, `ID_PERGUNTA`";
		$queryResp .= " FROM `resposta` WHERE `ID_PERGUNTA`=".$aux['ID_PERGUNTA'];
		
		$sqlResp = mysqli_query($cx, $queryResp) or die(mysqli_error($cx)); //caso haja um erro na consulta
		
		while($auxResp = mysqli_fetch_assoc($sqlResp)) {
			//percorrendo os registros da consulta.									
			echo "<div class='alert alert-success'>";
			if ($auxResp['TIPO'] == 'F') {
				echo "<i class='fa fa-times-circle fa-1x'></i>  ";
			} else {	echo "<i class='fa fa-check-circle fa-1x'></i>  ";};
			echo $auxResp['RESPOSTA'];
			echo "</div>";
		}
	}

	// Faz uma nova seleção no banco de dados, desta vez sem LIMIT, 
	// Executa o query da seleção acima
	$sql_query_all = mysqli_query($cx, $old_query);
	
	// Gera uma variável com o número total de registros no banco de dados
	$total_registros = mysqli_num_rows($sql_query_all);
	
	// Gera outra variável, desta vez com o número de páginas que será preciso. 
	// O comando ceil() arredonda "para cima" o valor
	$pags = ceil($total_registros/$qnt);
	
	// Número máximos de botões de paginação
	$max_links = 3;
	
	// Exibe o primeiro link "primeira página", que não entra na contagem acima(3)
	echo "<a href='painelquiz.php?p=1' target='_self'>primeira pagina</a> ";
	
	// Cria um for() para exibir os 3 links antes da página atual
	for($i = $p-$max_links; $i <= $p-1; $i++) {
	// Se o número da página for menor ou igual a zero, não faz nada
	// (afinal, não existe página 0, -1, -2..)
	if($i <=0) {
	//faz nada
	// Se estiver tudo OK, cria o link para outra página
	} else {
		echo "<a href='painelquiz.php?p=".$i."&turma=".$turma."&quiz=".$quiz."'  target='_self'>".$i."</a> ";
		}
	}

	// Exibe a página atual, sem link, apenas o número
	echo $p." ";
	// Cria outro for(), desta vez para exibir 3 links após a página atual
	for($i = $p+1; $i <= $p+$max_links; $i++) {
	// Verifica se a página atual é maior do que a última página. Se for, não faz nada.
	if($i > $pags)
	{
	//faz nada
	}
	// Se tiver tudo Ok gera os links.
		else
		{
			echo "<a href='painelquiz.php?p=".$i."&turma=".$turma."&quiz=".$quiz."' target='_self'>".$i."</a> ";
		}
	}
	// Exibe o link "última página"
	echo "<a href='painelquiz.php?p=".$pags."&turma=".$turma."&quiz=".$quiz."' target='_self'>ultima pagina</a> ";
?>
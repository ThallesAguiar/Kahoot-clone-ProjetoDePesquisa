<?php
session_start();
require_once './salaDAO.php';
require_once './salaVO.php';
require_once '../../config/conexao.php';




echo $nome=$_POST['nome'];
echo $descricao=$_POST['descricao'];
echo $visivel=$_POST['visivel'];
echo $imagem=$_FILES['imagem']['name'];
echo $id_usuario= $_SESSION['UsuarioID'];

if(isset($_SESSION)){
    $_SESSION['nome_sala']=$nome;
}

if (empty ($_POST['senha'])){
    $senha=NULL;
} else {
    $senha=$_POST['senha'];
}

if (!isset($_FILES['imagem'])) {
    $imagem=NULL;
    
    
}



$salaVO= new salaVO();
$salaVO->setNome($nome);
$salaVO->setSenha($senha);
$salaVO->setDescricao($descricao);
$salaVO->setVisivel($visivel);
$salaVO->setImagem($imagem);
$salaVO->setId_usuario($id_usuario);

$salaDAO = new salaDAO();


if ($salaDAO->insert($salaVO, $conn)){
        
    echo 'ID DA SALA: '.$id= mysqli_insert_id($conn);
    $_SESSION['id_sala']=$id;
    
    //PASTA ONDE O AQUIVO VAI SER SALVO "DIRETORIO"
    $_UP['pasta']='../../imagens_salas/'.$id.'/';
    
    //CRIAR A PASTA DE FOTO DO QUIZ
    //MKDIR -> CRIA DIRETORIOS      0777-> permissão total
    mkdir($_UP['pasta'], 0777);
    
    //VERIFICA SE É POSSIVEL MOVER O ARQUIVO PARA A PASTA ESCOLHIDA
    if(move_uploaded_file($_FILES['imagem']['tmp_name'],$_UP['pasta'].$imagem));
    
    header("Location:../quiz/index.php");
} else {
    header("Location: index.php");
}
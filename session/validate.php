<?php
session_start();
require_once '../config/conexao.php';

// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND ( empty($_POST['email']) OR empty($_POST['senha']))) {
    $_SESSION['loginErro']= "Email ou senha incorreto!";
    header("Location:../index.php");
    exit;
} else {

    $email= mysqli_real_escape_string($conn, $_POST['email']); 
    $senha= mysqli_real_escape_string($conn, $_POST['senha']);
    $senha= md5($senha);

// Validação do usuário/senha digitados
    $sql = "SELECT * FROM usuario WHERE EMAIL='$email' && SENHA='$senha' LIMIT 1";

    /* DICA: Também buscamos apenas por registros de usuários que estejam ativos, assim quando você precisar remover um usuário do sistema, 
      mas não pode simplesmente excluir o registro é só trocar o valor da coluna ativo pra zero.
      Para isso, precisamos criar o atributo ATIVO na tabela usuario e incluir no SQL acima a verificação "AND (`ativo` = 1) LIMIT 1"

      DICA 2: usar sha1 para inserir os usuarios no banco. Depois alterar o select da linha 26 */
//echo "teste: ".$sql."<br/>";

    $query = mysqli_query($conn, $sql)
            or
            die(mysqli_error($conn)); //caso haja um erro na consulta

    if (mysqli_num_rows($query) != 1) {
        // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
        $_SESSION['loginErro']= "Email ou senha incorreto!";
        header("Location:../index.php");
        exit;
    } else {
        // Salva os dados encontados na variável $resultado
        $resultado = mysqli_fetch_assoc($query);
    }

// Se a sessão não existir, inicia uma
    if (!isset($_SESSION))
        session_start();

// Salva os dados encontrados na sessão
    $_SESSION['UsuarioID'] = $resultado['ID_USUARIO'];
    $_SESSION['UsuarioNome'] = $resultado['NOME'];
    $_SESSION['UsuarioEmail'] = $resultado['EMAIL'];
    $_SESSION['UsuarioNivel'] = $resultado['ID_TIPO_USUARIO'];
    $_SESSION['UsuarioFoto'] = $resultado['FOTO_USUARIO'];
    
// Redireciona o visitante
    header("Location: restricted.php");
    exit;
}
<?php
session_start();
require_once '../../config/conexao.php';
require_once './jogoVO.php';
require_once './jogoDAO.php';

$jogoVO=new jogoVO();
$jogoDAO=new jogoDAO();

$_SESSION['NickName']=array('Maria','Alucard','Thalles','Stark','Maria','Alucard','Thalles','Stark');

$idSala=$_GET['idSala'];

//1° Quando não executada, a pagina salvará o PIN no BD 
if (!isset($id_jogo) and (empty($id_jogo))){
    
$id_sala =$_GET['idSala'];
$pin = mt_rand(100000, 999999);

$jogoVO->setPin($pin);
$jogoVO->setId_sala($id_sala);

$resultado=$jogoDAO->insert($jogoVO, $conn);

$id_jogo= mysqli_insert_id($conn);
    
    
}
if(isset($id_jogo) and (!empty($id_jogo))){//2° Após criado o PIN, executa esse codigo
    $usuario= $_SESSION['NickName'];
    //$usuario[]=$_SESSION['UsuarioNome'];
    $qnt_usuario= count($usuario);
};


?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>TPhE - Modo Clássico</title>

        <!-- Bootstrap core CSS -->
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/scrolling-nav.css" rel="stylesheet">

    </head>

    <body>


        <header class="bg-primary text-white" style="padding: 20px 0 80px;">
            <div class="container text-center">
                <p class="lead">Entre com este PIN</p>
                <h1 style="background-color: rgba(0,0,0,.1);">PIN: <?php echo $pin; ?></h1>
            </div>
        </header>



        <section id="about">
            <div class="container">
                <div class="row mt-1">
                    <div class="col-9 mx-auto">
                        <div class="col-12">
                         <a href="loading.php?comecar_jogo=comecar_jogo&&idSala=<?php echo $idSala?>" class="btn btn-success float-right">Começar</a>
                        <h2 class="text-warning">TPhE</h2>
                        <p class="lead">Aguarde os jogadores</p>
                        </div>
                    </div>
                </div>
                <?php
                    echo '<h1>';
                    echo $usuarios_online=$jogoVO->qtd_Jogadores_Online($qnt_usuario)
                         .'</h1>';    
                    
                        echo '<div class="row">';
                                foreach ($usuario as $nome){
                                        echo '<div class="col-lg-3 col-md-4 col-sm-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                          <h4 class="">
                                                          <img src="imagens/Boo.gif" width="50">'.$nome.'
                                                          </h4>
                                                    </div>
                                                </div>
                                              </div>';}
                        echo '</div>';?>
            </div>
        </section>
        <embed src="sons/Royalty Free Game Music - 8 Bit Happy by HeatleyBros.mp3" autostart="true" loop="true"  width="0" height="0">
        <!-- Bootstrap core JavaScript -->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



    </body>

</html>

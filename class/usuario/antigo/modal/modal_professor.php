<!-- Modal -->
<!--MODAL PROFESSOR-->
<div class="modal fade" id="modalProfessor" tabindex="-1" role="dialog" aria-labelledby="professorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="professorModalLabel">Registrar Professor</h5>
                <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!--FORMULARIO PROFESSOR-->
                <form class="form-signin" method="POST" action="../../../../TPhE/class/usuario/insert.php" enctype="multipart/form-data">
                    <div class="text-center mb-4">
                        <img class="mb-4 rounded-circle" src="../../../images_users/user.png"  alt="" width="72" height="72">
                        <!--<h1 class="h3 mb-3 font-weight-normal">Detalhes da sua conta</h1>-->
                    </div>

                    <div class="form-label-group">
                        <input type="text" id="nivel_acesso" name="professor" class="form-control text-center" placeholder="PROFESSOR"  readonly="readonly">
                    </div>&nbsp

                    <div class="form-label-group">
                        <input type="text" id="aluno" name="usuario" class="form-control" placeholder="Nome de usuario" required autofocus>
                    </div>&nbsp

                    <div class="form-label-group">
                        <input type="email" id="email-aluno" name="email" class="form-control" placeholder="Endereço de email" required autofocus>
                    </div>&nbsp

                    <div class="form-label-group input-group">
                        <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
                        <span class="input-group-btn">
                            <button class="btn btn-transparent" style="background-color: transparent;" onclick="mostrarSenha()" type="button">
                                <img src="../../imagens/ocultarSenha.png" alt="Mostrar senha/esconder senha" width="15" height="15">
                            </button>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="foto">Colocar foto.</label>
                        <input type="file" class="form-control-file" name="foto" id="foto" required autofocus onchange="previewImagem()">
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" name="2" type="submit">Entrar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!--FIM MODAL PROFESSOR-->
<?php

session_start();
include_once('connect.php');
include_once('autentica.php');

?>

<!DOCTYPE html>
<?php
include_once('menu.php');
?>
<!-- conteudo -->

<div class="right_col" role="main">
    <div id="msg" class="alert alert-success fade show" role="alert" style="opacity:0; text-align: center"></div>
    <h1>Usuarios</h1>
    <input type="hidden" name="nivlog" id="nivlog" value="<?php echo $_SESSION['usuario']['niv'] ?>">
    <input type="hidden" name="usulog" id="usulog" value="<?php echo $_SESSION['usuario']['usu'] ?>">
    <div id="central" name="central">
        <form action="" method="post" id="form">

            <div class="form-group col-md-4" id="usu">
                <input type="hidden" name="id_usu" id="id_usu">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" class="form-control" autocomplete="off" maxlength="8">
            </div>

            <div class="form-group col-md-5">
                <label for="nome">nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" autocomplete="off" disabled="true" maxlength="45">
            </div>

            <div class="form-group col-md-3">
                <label for="nivel">Nivel de acesso:</label>
                <select name="nivel" id="nivel" class="form-control" disabled="true">
                    <option value="0">Usuário</option>
                    <option value="1">Administrador</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="sen">Senha:</label>
                <input type="password" id="sen" name="sen" class="form-control" autocomplete="off" disabled="true" maxlength="8">
            </div>

            <div class="form-group col-md-4">
                <label for="csen">Confirmação de senha:</label>
                <input type="password" id="csen" name="csen" class="form-control" autocomplete="off" disabled="true" maxlength="8">
            </div>


            <div class="col-sm-5 col-md-5">
                <input id="enviar" name="enviar" value="Salvar" type="button" class="btn btn-success btn-lg" onClick="validar()" disabled="true"></button>
                <input id="excluir" name="excluir" value="excluir" type="button" class="btn btn-danger btn-lg" onClick="deletar()" disabled="true"></button>
                <button id="cancelar" type="reset" class="btn btn-cancel btn-lg" onClick="desabilitar()">Cancelar</button>
            </div>
        </form>
    </div>
</div>


<!-- Fim do conteudo -->
<?php
include_once('rodape.php');
?>


</div>
</div>
<script src="bootstrap/gentelella-master/vendors/jquery/dist/jquery.min.js"></script>

<script src="bootstrap/gentelella-master/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="bootstrap/gentelella-master/vendors/fastclick/lib/fastclick.js"></script>

<script src="bootstrap/gentelella-master/vendors/nprogress/nprogress.js"></script>

<script src="bootstrap/gentelella-master/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

<script src="bootstrap/gentelella-master/vendors/iCheck/icheck.min.js"></script>

<script src="bootstrap/gentelella-master/vendors/moment/min/moment.min.js"></script>
<script src="bootstrap/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<script src="bootstrap/gentelella-master/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="bootstrap/gentelella-master/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="bootstrap/gentelella-master/vendors/google-code-prettify/src/prettify.js"></script>

<script src="bootstrap/gentelella-master/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>

<script src="bootstrap/gentelella-master/vendors/switchery/dist/switchery.min.js"></script>

<script src="bootstrap/gentelella-master/vendors/select2/dist/js/select2.full.min.js"></script>

<script src="bootstrap/gentelella-master/vendors/parsleyjs/dist/parsley.min.js"></script>

<script src="bootstrap/gentelella-master/vendors/autosize/dist/autosize.min.js"></script>

<script src="bootstrap/gentelella-master/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>

<script src="bootstrap/gentelella-master/vendors/starrr/dist/starrr.js"></script>

<script src="bootstrap/gentelella-master/build/js/custom.min.js"></script>

<script src="script/usuario.js"></script>
</body>

</html>
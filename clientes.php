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
    <h1>Clientes</h1>

    <div id="central" name="central">
        <form action="incluirCliente.php" method="post" id="form">

            <div class="col-sm-6 col-md-3">
                <label for="tel">Telefone: </label>
                <input type="text" name="tel" id="tel" class="form-control" placeholder="Celular do cliente" autocomplete="off" maxlength="14"><br>
            </div>
            <div class="col-sm-6 col-md-6" id="list_nome">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do cliente" autocomplete="off" maxlength="50" disabled="true"><br>
                <input type="hidden" name="id_cli" id="id_cli">
            </div>
            <div class="col-sm-6 col-md-7">
                <label for="end">Enderço: </label>
                <input type="text" name="end" id="end" class="form-control" placeholder="Endereço do cliente" autocomplete="off" maxlength="50" disabled="true">
            </div>
            <div class="col-sm-6 col-md-2">
                <label for="num">Numero / Compl: </label>
                <input type="text" name="num" id="num" class="form-control" placeholder="Numero" autocomplete="off" maxlength="9" disabled="true"><br>
            </div>
            <div class="col-sm-6 col-md-4">
                <label for="bar">Bairro: </label>
                <input type="text" name="bar" id="bar" class="form-control" placeholder="Bairro do cliente" autocomplete="off" maxlength="20" disabled="true"><br>
            </div>
            <div class="col-sm-6 col-md-4">
                <label for="cid">Cidade: </label>
                <input type="text" name="cid" id="cid" class="form-control" placeholder="Cidade do cliente" autocomplete="off" maxlength="20" disabled="true">
            </div>
            <div class="col-sm-6 col-md-1">
                <label for="est">Estado: </label>
                <input type="text" name="est" id="est" class="form-control" placeholder="UF" autocomplete="off" maxlength="2" disabled="true"><br>
            </div>
            <div class="col-sm-5 col-md-5">
                <input id="enviar" name="enviar" value="Salvar" type="button" class="btn btn-success btn-lg" onClick="validar()" disabled="true"></button>
                <button id="cancelar" type="reset" class="btn btn-cancel btn-lg" onClick="limpar()">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<!-- Fim do conteudo -->
<!-- Rodapé  -->
<?php
include_once('rodape.php');
?>

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

<script src="script/cliente.js"></script>
</body>

</html>
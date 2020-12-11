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
    <h1>Produtos</h1>

    <div id="central" name="central">
        <form action="#" method="post" id="form">

            <div class="col-sm-6 col-md-3">
                <label for="cod">Código: </label>
                <input type="text" name="cod" id="cod" class="form-control" placeholder="Código do Produto" autocomplete="off" maxlength="12"><br>
            </div>
            <div class="col-sm-4 col-md-7" id="list_nome">
                <label for="descr">Descrição: </label>
                <input type="text" name="descr" id="descr" class="form-control" placeholder="Descrição do produto" autocomplete="off" maxlength="50" disabled="true"><br>
                <input type="hidden" name="id_pro" id="id_pro">
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-1 col-md-2">
                <label for="custo">Custo: </label>
                <input type="text" name="custo" id="custo" class="form-control" placeholder="Valor de custo" autocomplete="off" onkeyup="formatarMoeda(this)" disabled="true">
            </div>
            <div class="col-sm-1 col-md-2">
                <label for="venda">Venda: </label>
                <input type="text" name="venda" id="venda" class="form-control" placeholder="Valor de venda" autocomplete="off" onkeyup="formatarMoeda(this)" disabled="true"><br>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-5 col-md-5">
                <input id="enviar" name="enviar" value="Salvar" type="button" class="btn btn-success btn-lg" onClick="validar()" disabled="true"></input>
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

<script src="script/produtos.js"></script>
</body>

</html>
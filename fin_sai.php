<?php

session_start();
include_once('connect.php');
include_once('autentica.php');

$sqlcli = "SELECT id_cliente, cliente FROM clientes ORDER BY cliente";
$resultado = mysqli_query($connect, $sqlcli);

$sqlpro = "SELECT id_produto, codigo, descricao FROM produtos ORDER BY descricao";
$resultpro = mysqli_query($connect, $sqlpro);
?>

<!DOCTYPE html>
<?php
include_once('menu.php');
?>
<!-- conteudo -->

<div class="right_col" role="main">
<div id="msg" class="alert alert-success fade show" role="alert" style="opacity:0; text-align: center; display: fixed"></div>
    <h1>Saida manual</h1><br>
    
    <div id="central" name="central">
        <form action="#" method="post" id="form">
            <div class="col-sm-3 col-md-6 ">
                <label for="descr">Descrição: </label>
                <input type="text" name="descr" id="descr" class="form-control" autocomplete="off" maxlength="45"><br>
            </div>
            <div class="col-sm-3 col-md-3 ">
                <label for="val">Valor: </label>
                <input type="text" name="val" id="val" class="form-control" autocomplete="off" onkeyup="formatarMoeda()"><br>
            </div>
            <div class="col-sm-3 col-md-3 ">
                <label for="dt">Data: </label>
                <input type="date" name="dt" id="dt" class="form-control"><br>
            </div><div class="clearfix"></div><br>
            <div class="col-sm-1 col-md-5">
                <input id="enviar" name="enviar" value="Finalizar Saida" type="button" class="btn btn-success btn-lg" onClick="finalizar()" ></input>
                <button id="cancelar" type="reset" class="btn btn-cancel btn-lg">Cancelar</button>
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

<script src="script/sai_manual.js"></script>
</body>

</html>
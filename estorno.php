<?php

session_start();
include_once('connect.php');
include_once('autentica.php');

$sqlpro = "SELECT id_produto, codigo, descricao FROM produtos ORDER BY descricao";
$resultpro = mysqli_query($connect, $sqlpro);
?>

<!DOCTYPE html>
<?php
include_once('menu.php');
?>
<!-- conteudo -->

<div class="right_col" role="main">
<div id="msg"  class ="fade show" role="alert"></div>
    <h1>Estorno</h1>

    <div id="central" name="central">
        <form action="#" method="post" id="form">

            <div class="col-sm-3 col-md-6" id="list_nome">
                <label for="prod">Produto: </label>
                <select name="prod" id="prod" class="form-control">
                    <option value="0">Selecione um Produto</option>
                    <?php while ($dados = $resultpro->fetch_array()) { ?>

                        <option value="<?php echo $dados['id_produto']; ?>"><?php echo $dados['codigo']; ?> - <?php echo $dados['descricao']; ?></option>
                    <?php } ?>
                </select>
                <br>
            </div>
            <div class="col-sm-1 col-md-1 ">
                <label for="qtde">Qtde: </label>
                <input type="number" name="qtde" id="qtde" class="form-control" autocomplete="off" maxlength="5" min="1" value="1"><br>
            </div>
            <div class="col-sm-1 col-md-3 ">
                <label for="val">Valor: </label>
                <input type="text" name="val" id="val" class="form-control" autocomplete="off" placeholder="0,00" onkeyup="formatarMoeda()"><br>
            </div>
            <dic class="clearfix"></dic>
            <div class="col-sm-1 col-md-5">
                <input id="estornar" name="estornar" value="Realizar estorno" type="button" class="btn btn-success btn-lg" onClick="estornar()"></input>
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

<script src="script/estorno.js"></script>
</body>

</html>
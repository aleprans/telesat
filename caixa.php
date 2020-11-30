<?php

session_start();
include_once('connect.php');
include_once('autentica.php');

$sqlcli = "SELECT id_cliente, cliente FROM clientes ORDER BY cliente";
$resultado = mysqli_query($connect, $sqlcli);

$sqlpro = "SELECT id_produto, codigo, descricao, qtde_est FROM produtos WHERE  qtde_est > 0 ORDER BY descricao";
$resultpro = mysqli_query($connect, $sqlpro);
?>

<!DOCTYPE html>
<?php
include_once('menu.php');
?>
<!-- conteudo -->

<div class="right_col" role="main">
<div id="msg" class="alert alert-success fade show" role="alert" style="opacity:0; text-align: center; display: fixed"></div>
    <h1>Caixa</h1>

    <div id="central" name="central">
        <form action="#" method="post" id="form">

            <div class="col-sm-3 col-md-5">
                <label for="cli">Cliente: </label>
                <select name="cli" id="cli" class="form-control">
                    <option value="0">BALCÃO</option>
                    <?php while ($dados = $resultado->fetch_array()) { ?>

                        <option value="<?php echo $dados['id_cliente']; ?>"><?php echo $dados['cliente']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-3 col-md-6" id="list_nome">
                <label for="prod">Produto: </label>
                <select name="prod" id="prod" class="form-control">
                    <option value="0">Selecione um Produto</option>
                    <?php while ($dados = $resultpro->fetch_array()) { ?>

                        <option value="<?php echo $dados['id_produto']; ?>"><?php echo $dados['codigo']; ?> - <?php echo $dados['descricao']; ?> - Qtde em estoque <?php echo $dados['qtde_est'];?></option>
                    <?php } ?>
                </select>
                <br>
            </div>
            <div class="col-sm-1 col-md-1 ">
                <label for="qtde">Qtde: </label>
                <input type="number" name="qtde" id="qtde" class="form-control" autocomplete="off" maxlength="5" min="1" disabled>
                <br>
            </div>
            <div class="col-sm-1 col-md-1 ">
                <input id="incluir" name="incluir" value="Incluir produto" type="button" class="btn btn-success btn-sm" onClick="incProd()" ></input>
            </div><br>
            <div class="col-md-12 col-sm-6  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Produtos</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped" id="tbprod">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Descrição</th>
                                    <th>Valor un</th>
                                    <th>Qtde</th>
                                    <th>Valor total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Conteudo dinamico -->                        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 col-md-4 ">
                <label for="vtot" style="font-size: 250%">Valor Total: </label>
                <input type="text" style="font-size: 150%; background-color: #fff" name="vtot" id="vtot" class="form-control" autocomplete="off" maxlength="10" placeholder="R$" disabled><br>
            </div>
            <div class="col-sm-1 col-md-4 ">
                <label for="vrec" style="font-size: 250%">Valor Recebido: </label>
                <input type="text" style="font-size: 150%; background-color: #fff" name="vrec" id="vrec" class="form-control" autocomplete="off" maxlength="10" placeholder="R$" disabled><br>
            </div>
            <div class="col-sm-1 col-md-4 ">
                <label for="troco" style="font-size: 250%">Troco: </label>
                <input type="text" style="font-size: 150%; background-color: #fff" name="troco" id="troco" class="form-control" autocomplete="off" maxlength="10" placeholder="R$" disabled><br>
            </div>
            <div class="clearfix"></div>
            <!-- Fim teste tabela -->

            <div class="col-sm-1 col-md-5">
                <input id="enviar" name="enviar" value="Finalizar compra" type="button" class="btn btn-success btn-lg" onClick="finalizar()" ></input>
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

<script src="script/caixa.js"></script>
</body>

</html>
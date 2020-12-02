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
<div id="msg" class="alert alert-success fade show" role="alert" style="opacity:0; text-align: center; display: fixed"></div>
    <h1>Fechamento de Caixa</h1>

    <div id="central" name="central">
        <form action="#" method="post" id="form">
          
            <div class="col-md-12 col-sm-6  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Lista de Vendas</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped" id="tbprod">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Cliente</th>
                                    <th>Valor</th>
                                    <th>Data</th>
                                    <th>Ações</th>
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
                <label for="vtot" style="font-size: 250%">Valor total: </label>
                <input type="text" style="font-size: 150%; background-color: #fff" name="vtot" id="vtot" class="form-control" autocomplete="off" maxlength="10" placeholder="R$" disabled><br>
            </div>
            <div class="col-sm-1 col-md-4 ">
                <label for="vrec" style="font-size: 250%">Valor em dinheiro: </label>
                <input type="text" style="font-size: 150%; background-color: #fff" name="vrec" id="vrec" class="form-control" autocomplete="off" maxlength="10" placeholder="R$" disabled><br>
            </div>
            <div class="col-sm-1 col-md-4 ">
                <label for="troco" style="font-size: 250%">Diferença: </label>
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

<script src="script/"></script>
</body>

</html>
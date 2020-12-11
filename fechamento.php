<?php

session_start();
include_once('connect.php');
include_once('autentica.php');

$sqlcaixa = "SELECT p.codigo, p.descricao, SUM(i.qtde_item) qtde, SUM(i.valor) valor FROM itens_venda i 
JOIN produtos p ON i.id_item_vend = p.id_produto 
LEFT JOIN vendas v ON i.id_venda = v.id_vend 
WHERE v.st = 0 GROUP BY i.id_item_vend;";

$sqlmov = "SELECT id_mov, descricao, val_mov, tipo_mov FROM mov_manuais ORDER BY tipo_mov;";

$result_mov = mysqli_query($connect, $sqlmov);
$resultado = mysqli_query($connect, $sqlcaixa);

?>

<!DOCTYPE html>

<?php
include_once('menu.php');
?>

<!-- conteudo -->

<div class="right_col" role="main">
    <div id="msg"  class ="fade show" role="alert"></div>
    <h1>Fechamento de Caixa</h1>

    <div id="central" name="central">
        <form action="#" method="post" id="form">
          
            <div class="col-md-12 col-sm-6  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Relação de movimentos</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped" id="tbprod">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th class="text-center">Produto</th>
                                    <th class="text-center">Qtde/Tipo</th>
                                    <th class="text-center">Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $row = mysqli_num_rows($resultado);
                                if ($row > 0) { 
                                    while ($dados = $resultado->fetch_array()) { ?>
                                        
                                        <tr>
                                        <td><?php echo $dados['codigo']; ?></td>
                                        <td class="text-center"><?php echo $dados['descricao']; ?></td>
                                        <td class="tipo text-center"><?php echo $dados['qtde']; ?></td>
                                        <td class="text-center" data-valor="<?php echo $dados['valor']; ?>"><?php echo $dados['valor']; ?></td>
                                        </tr><?php
                                    } while ($dadosm = $result_mov->fetch_array()) { ?>
                                    <tr>
                                        <td><?php echo $dadosm['id_mov']; ?></td>
                                        <td class="text-center"><?php echo $dadosm['descricao']; ?></td>
                                        <td class="tipo text-center"><?php echo $dadosm['tipo_mov']; ?></td>
                                        <td class="text-center" data-valor="<?php echo $dadosm['val_mov']; ?>"><?php echo $dadosm['val_mov']; ?></td>
                                        </tr><?php
                                    } 
                                } else { ?>
                                    <td id="tdnull" colspan="4">Nenhum Item Em Aberto</td><?php } ?>
                           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 col-md-4 ">
                <label for="vtot" style="font-size: 250%">Valor total: </label>
                <input type="text" style="font-size: 150%; background-color: #fff" name="vtot" id="vtot" class="form-control" autocomplete="off" maxlength="10" placeholder="0,00" disabled><br>
            </div>
            <div class="col-sm-1 col-md-4 ">
                <label for="vrec" style="font-size: 250%">Valor em dinheiro: </label>
                <input type="text" style="font-size: 150%; background-color: #fff" name="vrec" id="vrec" class="form-control" autocomplete="off" maxlength="10" placeholder="0,00" onkeyup="formatarMoeda()"><br>
            </div>
            <div class="col-sm-1 col-md-4 ">
                <label for="troco" style="font-size: 250%">Diferença: </label>
                <input type="text" style="font-size: 150%; background-color: #fff" name="troco" id="troco" class="form-control" autocomplete="off" maxlength="10" placeholder="0,00" disabled><br>
            </div>
            <div class="clearfix"></div>

            <div class="col-sm-1 col-md-5">
                <input id="enviar" name="enviar" value="Fechar caixa" type="button" class="btn btn-success btn-lg" onClick="finalizar()" ></input>
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

<script src="script/fechamento.js"></script>
</body>

</html>
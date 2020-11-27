<?php
session_start();

include_once('autentica.php');
include_once('connect.php');

$sql = "select * from produtos order by descricao";

$resultado = mysqli_query($connect, $sql);


?>
<!DOCTYPE html>
<?php
include_once('menu.php');
?>
<!-- conteudo -->


<div class="right_col" role="main">
  <div id="msg" class="alert alert-success fade show" role="alert" style="opacity:0; text-align: center"></div>
  <h3>Lista de Produtos</h3>
  <div class="clearfix"></div>

  <div class="content">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="table-responsive">
              <table id="id_table_usuario" class="table table-hover" data-search="true" data-sort-class="table-active" data-sortable="true" data-locale="pt-BR" data-height="550" data-toolbar=".toolbar" data-search="true" data-show-toggle="true" data-pagination="true">
                <thead>
                  <tr>
                    <th data-sortable="true" data-field="id">Código</th>
                    <th>Produto</th>
                    <th>Custo</th>
                    <th>Venda</th>
                    <th>Qtde em estoque</th>
                    <th>Qtde Vendido</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $row = mysqli_num_rows($resultado);
                  if ($row > 0) {
                    while ($dados = $resultado->fetch_array()) { ?>
                      <tr>
                        <td><?php echo $dados['codigo']; ?></td>
                        <td><?php echo $dados['descricao']; ?></td>
                        <td><?php echo $dados['custo']; ?></td>
                        <td><?php echo $dados['venda']; ?></td>
                        <td><?php echo $dados['qtde_est']; ?></td>
                        <td><?php echo $dados['qtde_vend']; ?></td>
                        <td><button class="btn btn-primary btn-sm" title="Editar Produto" data-toggle="tooltip" data-placement="bottom" onclick="editar(<?php echo $dados['id_produto']; ?>)"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btn-sm" title="Excluir Produto" data-toggle="tooltip" data-placement="bottom" onclick="excluir(<?php echo $dados['id_produto']; ?>)"><i class="fa fa-trash"></i> </button></td>
                      </tr>
                    <?php
                    }
                  } else { ?>
                    <td id="tdnull" colspan="7">Nenhum Produto Cadastrado</td>
                  <?php } ?>

                </tbody>

              </table>
              <button class="btn btn-success btn-lg" title="Novo Produto" data-toggle="tooltip" data-placement="bottom" onclick="window.location = 'produtos.php'"><i class="fa fa-user-plus"></i> </button>
            </div>
          </div>
        </div>
      </div>

      <div id="theModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
          </div>
        </div>
      </div>

    </div>
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

<script src="script/listaproduto.js"></script>
</body>

</html>
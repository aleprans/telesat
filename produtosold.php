<?php
session_start();
include_once('connect.php');
include_once('autentica.php');

// $sql = "select t.tipo_mat, m.desc_mat, u.larg, u.comp, u.qtde, u.id_mat_util
// from materiais as m 
// inner join tipo_mat as t on t.id_tipo_mat = m.id_tipo 
// inner join util_mat as u on u.id_mat = m.id_material where u.id_prod = 0;";
// $result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>

    
 
    <!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> -->
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilo/produtos.css">
	  
    <title><?php echo $title ?></title>

    
    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet"/>
    
    
    <!-- Bootstrap -->
    <link href="bootstrap/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="bootstrap/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="bootstrap/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="bootstrap/gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="bootstrap/gentelella-master/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="bootstrap/gentelella-master/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="bootstrap/gentelella-master/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="bootstrap/gentelella-master/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="bootstrap/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="bootstrap/gentelella-master/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="bootstrap/gentelella-master/build/css/custom.min.css" rel="stylesheet">


  </head>

  <body>
    <?php
      include_once('menu.php');
    ?>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <div id="msg_modal" class="alert alert-success fade show" role="alert" style="opacity:0; text-align: center"></div>
        <h4 class="modal-title" id="staticBackdropLabel">Incluir Materiais</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
          $sql = "select m.id_material, t.tipo_mat, t.cat_mat, m.desc_mat, m.custo from materiais m join tipo_mat t on m.id_tipo = t.id_tipo_mat order by t.tipo_mat;";
          $result = mysqli_query($connect, $sql);
        ?>
        <select name="material" id="material" class="form-control">
          <option value="0">Selecione um material</option>
          <?php while($dados = $result->fetch_array()) {?>
          <option value="<?php echo $dados['id_material']; ?> - <?php echo $dados['cat_mat']; ?>"><?php echo $dados['tipo_mat']; ?> - <?php echo $dados['desc_mat']; ?>
          </option>
          <?php }?>
        </select>
        
        <div id="dlarg" class="col-sm-2 col-md-3">
          <label for="larg">Largura cm:  </label>
          <input type="text" name="larg" id="larg" class="form-control" autocomplete="off" disabled><br>
        </div>
        <div id="dcomp" class="col-sm-2 col-md-3">
          <label for="comp">Comprimento cm:  </label>
          <input type="text" name="comp" id="comp" class="form-control" autocomplete="off" disabled><br>
        </div>
        <div id="dqtde" class="col-sm-2 col-md-3">
          <label for="qtde">Qtde:  </label>
          <input type="text" name="qtde" id="qtde" class="form-control" autocomplete="off" disabled><br>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="inc_model" class="btn btn-primary" onclick="val_modal()" disabled>Incluir</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->


    <div class="right_col" role="main">
      <div id="msg" class="alert alert-success fade show" role="alert" style="opacity:0; text-align: center"></div>
    
      <h3 id="title">Produtos</h3>
      
      <div id="central" name="central">
        <form id="form" name="form">
        <input type="hidden" name="id_prod" id="id_prod">
        <div class="col-sm-6 col-md-4">
          <label for="prod">Produto: </label>
          <input type="text" name="prod" id="prod" class="form-control" placeholder="Produto" autocomplete="off" maxlength="30"><br>
        </div>
        <div class="col-sm-6 col-md-5">
          <label for="desc">Descrição do produto: </label>
          <textarea name="desc" id="desc" cols="80" rows="4" class="form-control"  maxlength="350" placeholder="Descrição do produto" autocomplete="off" disabled="true"></textarea><br>
        </div>
      
        <div class="col-sm-6 col-md-10">
          <div id="separador" style="border: 1px solid grey"></div>
          <label for="tab">Mateiras utilizados: </label>
          <div class="container">
            <div style="border: 2px solid grey">
              <div class = "table-responsive">
                <table id="id_table_usuario" class="table table-hover" data-search="true" data-sort-class="table-active" data-sortable="true" data-locale="pt-BR" data-height="550" data-toolbar=".toolbar" data-search="true"  data-show-toggle="true"  data-pagination="true">
                  <thead>
                    <tr>
                      <th>Material</th>
                      <th >Largura</th>
                      <th >Comp</th>
                      <th >Qtde</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  </tbody>
                </table>
              </div>
            </div>
            <button type="button" id="addmat" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop" disabled>Inserir Material</button>
            <div id="separador" style="border: 1px solid grey"></div>
            <div class="col-sm-6 col-md-3">
              <label for="valc">Valor  custo:  </label>
              <input type="decimal" name="valc" id="valc" class="form-control" placeholder="Valor de custo do produto" autocomplete="off" disabled = "true"><br>
            </div>
      
            <div class="col-sm-6 col-md-3">
              <label for="val">Valor Venda:  </label>
              <input type="decimal" name="val" id="val" class="form-control" placeholder="Valor de Venda" disabled="true" autocomplete="off"><br>
            </div>
                
            <div class="col-sm-6 col-md-3">
              <label for="qtde_est">Qtde em estoque:  </label>
              <input type="number" name="qtde_est" id="qtde_est" class="form-control" disabled="true"><br><br>
            </div>
                 
            <div class="col-sm-6 col-md-4">
              <input id="enviar" name="enviar" value="Salvar" type="button" class="btn btn-success btn-lg" onClick="validar()" disabled= "true"></input>
              <input id="cancelar" type="reset" class="btn btn-cancel btn-lg" onClick="limpar()" value="Cancelar"></input>
            </div>
          </div>    
        </div>  
        </form>  
      </div> 
    </div>
    <footer>
    </footer>
  </body>
</html>
<!-- jQuery -->
<script src="bootstrap/gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="bootstrap/gentelella-master/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bootstrap/gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="bootstrap/gentelella-master/vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="bootstrap/gentelella-master/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="bootstrap/gentelella-master/vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="bootstrap/gentelella-master/vendors/moment/min/moment.min.js"></script>
<script src="bootstrap/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="bootstrap/gentelella-master/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="bootstrap/gentelella-master/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="bootstrap/gentelella-master/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="bootstrap/gentelella-master/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="bootstrap/gentelella-master/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="bootstrap/gentelella-master/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="bootstrap/gentelella-master/vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="bootstrap/gentelella-master/vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="bootstrap/gentelella-master/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="bootstrap/gentelella-master/vendors/starrr/dist/starrr.js"></script>
<!-- Custom Theme Scripts -->
<script src="bootstrap/gentelella-master/build/js/custom.min.js"></script>    
<!--Mascaras-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="script/produtos.js"></script>


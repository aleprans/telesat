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
    <h1 style="text-align: center"><?php echo $title ?></h1>
    <!--img src="imagens/logo200.jpg" style="height: 400px; background-size: contain; background-repeat: no-repeat;background-position: center;"-->
    <div class="clearfix"></div>

    <!--img src="imagens/rolling.gif" id="loading-indicator" style="display:none;"/-->
    <div class="content">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <?php
              include_once('dashboardlinear.php');
              ?>
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
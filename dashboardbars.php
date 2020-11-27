<?php

include_once('autentica.php');
include_once('connect.php');

$sql = "select sum(valor_vend) as total, day(dt_venda) as dia from vendas group by dt_venda order by dt_venda;";
$resultado = mysqli_query($connect, $sql);
$sql2 = "select sum(valor_vend) as total from vendas;";
$resultado2 = mysqli_query($connect, $sql2);
$dados2 = $resultado2->fetch_array();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Dia', 'Faturamento mensal'],
          <?php while ($dados = $resultado->fetch_array()) { ?>
            ['<?php echo $dados['dia'];?>','<?php echo number_format((float)$dados['total'], 2, '.', '');?>'],
          <?php } ?> 
        ]);

        var options = {
          chart: {
            title: 'Faturamento total do Mês R$ <?php echo number_format((float)$dados2['total'], 2, '.', '');?>',
            subtitle: 'Faturamento por dia',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: auto; height: 500px;"></div>
  </body>
</html>
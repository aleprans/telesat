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
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Dia', 'Faturamento'],
          <?php while ($dados = $resultado->fetch_array()) { ?>
          [<?php echo $dados['dia']; ?>, <?php echo $dados['total']; ?>],
          <?php } ?>
        ]);

        var options = {
          title: 'Faturamento Mensal Total R$ <?php echo number_format((float)$dados2['total'], 2, '.', ''); ?>',
          subtitle: 'Diario',
          curveType: 'function',
          legend: { position: 'right' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
</head>
  <body>
    <div id="curve_chart" style="width: 90%; height: 500px"></div>
  </body>
</html>
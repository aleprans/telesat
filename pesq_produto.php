<?php
include_once('connect.php');

function retorna($connect, $sqlprod){

$result_prod = mysqli_query($connect, $sqlprod);
$row_prod = mysqli_fetch_assoc($result_prod);

$dados['id_prod'] = $row_prod['id_produto'];
$dados['cod'] = $row_prod['codigo'];
$dados['desc'] = $row_prod['descricao'];
$dados['custo'] = $row_prod['custo'];
$dados['venda'] = $row_prod['venda'];
$dados['qtde'] = $row_prod['qtde_est'];
$dados['qvend'] = $row_prod['qtde_vend'];

return json_encode($dados);
}

if (isset($_GET['produto'])) {
    $valor = $_GET['produto'];
    $sqlprod = "select * from produtos where id_produto = '$valor';";
    echo retorna($connect, $sqlprod);
}

if (isset($_GET['cod_prod'])) {
    $valor = $_GET['cod_prod'];
    $sqlprod = "select * from produtos where codigo = '$valor';";
    echo retorna($connect, $sqlprod);
}
?>
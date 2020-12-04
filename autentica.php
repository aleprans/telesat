<?php

$title = "Telesat";
$icon = "imagens/antena.jpg";

// itens menu
$pginicial = "inicial.php";
$clientes = "listaclientes.php";
$produtos = "listaprodutos.php";
$usuarios = "usuarios.php";
$caixa = "caixa.php";
$ent = "fin_ent.php";
$sai = "fin_sai";
$est = "estorno.php";
$fec = "fechamento.php";
$prod_ent = "ent_prod.php";
$prod_sai = "sai_prod.php";
$prod_bal = "prod_bal.php";

if (!$_SESSION['usuario']) {
    header('Location: index.php');
    exit;
}

?>
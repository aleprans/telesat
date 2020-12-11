<?php
session_start();

include_once('connect.php');

$total = $_POST['vtot'];
$receb = $_POST['vrec'];
$dif = $_POST['dif'];
$usu = $_SESSION['usuario']['usu'];
$data = date("Y/m/d");

$sql = "UPDATE vendas SET st = 1;";
$result = mysqli_query($connect, $sql);

if ($result){
    echo json_encode(["status" => true, "msg" => "Fechamento realizado com sucesso!"]);
}else {
    echo json_encode(["status" => false, "msg" => "Falha na conexão!"]);
}

?>
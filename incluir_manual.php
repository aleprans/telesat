<?php
session_start();
include_once('connect.php');

$descr = $_POST['descr'];
$val = $_POST['val'];
$dt = $_POST['dt'];
$tipo = $_POST['tipo'];
$usu = $_SESSION['usuario']['usu'];

$sql = "INSERT INTO mov_manuais (descricao, val_mov, dt_mov, tipo_mov, usu) VALUES ('$descr', '$val', '$dt', '$tipo', '$usu');";
$result = mysqli_query($connect, $sql);

If (!$result){
    echo json_encode(['status'=>false, 'msg'=>'Falha na Conexão']);
    
}else {
    echo json_encode(['status'=>true, 'msg'=>'Dados inseridos com sucesso!']);

}mysqli_close($connect);

?>
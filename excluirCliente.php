<?php
include_once('connect.php');

if (isset($_GET['id_cliente'], $connect)) {
    echo retorna($_GET['id_cliente'], $connect);

}

function retorna($cliente, $connect){

    $sql = "DELETE FROM clientes WHERE id_cliente = '$cliente'";
    $resultado = mysqli_query($connect, $sql);

    if ($resultado) {
        echo json_encode(['status'=>true, 'msg'=>'Cliente excluido com Sucesso!']);
        mysqli_close($connect);
    }else {
        echo json_encode(['status'=>false, 'msg'=>'Conexão Falhou!']);
        mysqli_close($connect);
        }
}
?>
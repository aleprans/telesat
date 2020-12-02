<?php
session_start();
include_once('connect.php');
include_once('autentica.php');

if (isset($_GET['produto']) && isset($_GET['qtde']) && isset($_GET['valor'])){
    $prod = mysqli_escape_string($connect,$_GET['produto']);
    $qtde = mysqli_escape_string($connect, $_GET['qtde']);
    $valor = mysqli_escape_string($connect, $_GET['valor']);
    $date = date("Y/m/d");
    $usu = $_SESSION['usuario']['usu'];

    mysqli_autocommit($connect, false);

    mysqli_begin_transaction($connect);

        $sql_est = "UPDATE produtos SET qtde_est = qtde_est + '$qtde' WHERE id_produto = '$prod';";
        $result = mysqli_query($connect, $sql_est);
        
        if($result){
            $sql_mov = "INSERT INTO mov_manuais (descricao, val_mov, dt_mov, tipo_mov, usu) VALUES ('ESTORNO', '$valor', '$date', 'S', '$usu');";
            $resultado = mysqli_query($connect, $sql_mov);

            if($resultado){
                mysqli_commit($connect);
                mysqli_close($connect);
                echo json_encode(['status'=>true, 'msg'=>'Estorno realizado com sucesso!']);
            }else{
                mysqli_rollback($connect);
                mysqli_close($connect);
                echo json_encode(['status'=>false, 'msg'=>'Falha na Conexão!']);
            }
        }else{
            mysqli_rollback($connect);
            mysqli_close($connect);
           
        }
}else {
    echo json_encode(['status'=>false, 'msg'=>'Falha na Conexão!']);
}
?>
<?php

include_once('connect.php');


function retorna($connect, $id_produto){
    $id_produto = mysqli_escape_string($connect, $_POST['id_produto']);
    $custo = mysqli_escape_string($connect, $_POST['custo']);
    $desc = mysqli_escape_string($connect, $_POST['desc']);
    $venda = mysqli_escape_string($connect, $_POST['venda']);
    $qvend = mysqli_escape_string($connect, $_POST['qvend']);
    $qtde = mysqli_escape_string($connect, $_POST['qtde']);
    $cod = mysqli_escape_string($connect, $_POST['cod']);

    if ($id_produto > 0) {
        $sql = "UPDATE produtos SET codigo = '$cod', custo = '$custo', descricao = '$desc', venda = '$venda', qtde_est = '$qtde', qtde_vend = '$qvend' WHERE  id_produto = '$id_produto';";
        $resultado = mysqli_query($connect, $sql);
    } else {
        
        $sql = "INSERT INTO produtos(codigo, custo, venda, descricao, qtde_est, qtde_vend) VALUES ('$cod', '$custo', '$venda', '$desc', '$qtde', '$qvend');";
        $resultado = mysqli_query($connect, $sql);
    }


    if (!$resultado) {
        echo json_encode(['status'=>false, 'msg'=>'Conexão Falhou!']);
        mysqli_close($connect);
    }else {
        echo json_encode(['status'=>true, 'msg'=>'Dados Inseridos com Sucesso!']);
        mysqli_close($connect);
    }
}

if (isset($_POST['id_produto'])) {
    echo retorna($connect, $_POST['id_produto']);
}

?>
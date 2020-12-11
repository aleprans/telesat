<?php

include_once('connect.php');

if (isset($_POST['prod'])){
    echo retorna($connect, $_POST['prod']);
}

function retorna($connect, $prod){
    $qtde = $_POST['qtde'];
    $tipo = $_POST['tipo'];

    if ($tipo == 0){
        $sql = "UPDATE produtos SET qtde_est = qtde_est + '$qtde' where id_produto = '$prod';";
    }else if ($tipo == 1){
        $sql = "UPDATE produtos SET qtde_est = qtde_est - '$qtde' where id_produto = '$prod';";
    }
    $result = mysqli_query($connect, $sql);

    if ($result){
        echo json_encode(['status'=> true, 'msg'=>'Estoque atualizado com sucesso!']);
    }else {
        echo json_encode(['status'=> false, 'msg'=> 'Falha na conexão!']);
    }
}
?>
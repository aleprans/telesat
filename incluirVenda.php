<?php
include_once('connect.php');
session_start();


if (isset($_POST['venda'])) {
    $array = json_decode($_POST['venda'], true);
    $key = count($array) - 1;
    $data = date("Y/m/d");
    $total = $array[$key]['total'];
    $cli = $array[$key]['cli'];
    $usu = $_SESSION['usuario']['usu'];

    mysqli_autocommit($connect, false);

    mysqli_begin_transaction($connect);

        $sql = "INSERT INTO vendas (valor_vend, dt_venda, cli_venda, usu) VALUES ('$total', '$data', '$cli', '$usu');";
        $result = mysqli_query($connect, $sql);
        $last_id = mysqli_insert_id($connect);
        if($result){

            for($i = 0; $i < count($array); $i++){
                $id = $array[$i]['id'];
                $qtde = $array[$i]['qtde'];

                $sqli = "INSERT INTO itens_venda (id_item_vend, id_venda, qtde_item) VALUES ('$id', '$last_id', '$qtde');";
                $resulti = mysqli_query($connect, $sqli);
            
            }
            if($resulti){
                echo json_encode(['status'=>true, 'msg'=>'Dados Inseridos com Sucesso!']);
                mysqli_commit($connect);
            }else{
                echo json_encode(['status'=>false, 'msg'=>'Erro na conexão!']);
                mysqli_rollback($connect);
            }
        }else{
            echo json_encode(['status'=>false, 'msg'=>'Erro na conexão!']);
            mysqli_rollback($connect);
        }

    
    mysqli_close($connect);

}
?>
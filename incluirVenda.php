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
    $form = $array[$key]['form'];
   

    
    mysqli_autocommit($connect, false);

    mysqli_begin_transaction($connect);

        $sql = "INSERT INTO vendas (valor_vend, dt_venda, cli_venda, usu, form_pag) VALUES ('$total', '$data', '$cli', '$usu', '$form');";
        $result = mysqli_query($connect, $sql);
        $last_id = mysqli_insert_id($connect);
        if($result){

            for($i = 0; $i < count($array); $i++){
                $id = $array[$i]['id'];
                $qtde = $array[$i]['qtde'];
                $tot_uni = $array[$i]['tot_uni'];
               
                $sqli = "INSERT INTO itens_venda (id_item_vend, id_venda, qtde_item, valor) VALUES ('$id', '$last_id', '$qtde', '$tot_uni');";
                $resulti = mysqli_query($connect, $sqli);
            
            }

            if($resulti){
                $sql_est = "UPDATE produtos set qtde_est = qtde_est - '$qtde' WHERE id_produto = '$id';";
                $res_est = mysqli_query($connect, $sql_est);
            }else {
                echo json_encode(['status'=>false, 'msg'=>'Erro na conexão!']);
                mysqli_rollback($connect);
            }

            if($res_est){
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
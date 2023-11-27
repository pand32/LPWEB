<?php
require_once("../mysqli_conexao.php");

$response = array(); // Crie um array para armazenar a resposta

if(isset($_GET['id_venda'])) {
    $venda = $_GET['id_venda'];

    $result = mysqli_query($conn, "UPDATE venda SET status_venda ='vendido' WHERE id_venda=$venda");

    if ($result) {
        $response['mensagem'] = "Compra efetuada com sucesso";
    } else {
        $response['erro'] = "Erro ao fechar pedido: " . mysqli_error($conn);
    }
} else {
    $response['erro'] = "ID de venda não foi recebido.";
}

// Envie a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>

<?php
require_once("../mysqli_conexao.php");

$response = array(); // Crie um array para armazenar a resposta

if(isset($_POST)) {
    $venda = mysqli_real_escape_string($conn, $_POST['id_venda']);
    $produto = mysqli_real_escape_string($conn, $_POST['id_produto']);
    $valor = mysqli_real_escape_string($conn, $_POST['vlr_venda']);
    $qtd = mysqli_real_escape_string($conn, $_POST['qtd_venda']);

    $result = mysqli_query($conn, 
        "INSERT INTO item_venda (id_venda, id_produto, vlr_venda, qtd_venda, status_item_venda) VALUES ($venda, 
        $produto, $valor, $qtd, 'ativo')");
    if ($result) {
        $response['mensagem'] = "Produto adicionado ao carrinho";
      } else {
        $response['erro'] = "Erro ao adicionar Produto ao carrinho: " . mysqli_error($conn);
      }
}


// Envie a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
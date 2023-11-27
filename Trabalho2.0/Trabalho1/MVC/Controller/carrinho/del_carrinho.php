<?php
require_once("../mysqli_conexao.php");

$produto = $_GET['id_produto'];
$venda = $_GET['id_venda'];

$result = mysqli_query($conn, "DELETE FROM item_venda WHERE id_produto = $produto AND id_venda = $venda");
$response['mensagem'] = "Produto retirado do carrinho com sucesso";

// Envie a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>

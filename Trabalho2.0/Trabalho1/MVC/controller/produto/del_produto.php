<?php
require_once("../mysqli_conexao.php");

$response = array(); // Crie um array para armazenar a resposta

$id = $_GET['id_produto'];

$result = mysqli_query($conn, "DELETE FROM PRODUTO WHERE id_produto = $id");

if ($result) {
    $response['mensagem'] = "Produto excluida com sucesso";
  } else {
    $response['erro'] = "Erro ao adicionar Produto: " . mysqli_error($conn);
}
// Envie a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);

?>

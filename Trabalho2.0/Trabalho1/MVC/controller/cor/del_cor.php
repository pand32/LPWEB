<?php
require_once("../mysqli_conexao.php");

$response = array(); // Crie um array para armazenar a resposta

$id = $_GET['id_cor'];

$result = mysqli_query($conn, "DELETE FROM cor WHERE id_cor = $id");
if ($result) {
    $response['mensagem'] = "Cor excluida com sucesso";
  } else {
    $response['erro'] = "Erro ao adicionar Cor: " . mysqli_error($conn);
}
// Envie a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>



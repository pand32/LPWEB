<?php
require_once("../mysqli_conexao.php");

$response = array(); // Crie um array para armazenar a resposta

if (isset($_POST)) {
  $desc_produto = mysqli_real_escape_string($conn, $_POST['desc_produto']);
  $capacidade = mysqli_real_escape_string($conn, $_POST['capacidade']);
  $vlr_sugerido = mysqli_real_escape_string($conn, $_POST['vlr_sugerido']);
  $vlr_custo = mysqli_real_escape_string($conn, $_POST['vlr_custo']);
  $voltagem = mysqli_real_escape_string($conn, $_POST['voltagem']);

  if (empty($desc_produto)) {
    $response['erro'] = "Descrição não pode ficar em branco";
  } else {
    $result = mysqli_query($conn, "INSERT INTO produto (desc_produto, capacidade,
         vlr_sugerido, vlr_custo, voltagem) VALUES ('$desc_produto', '$capacidade',
          '$vlr_sugerido', '$vlr_custo', '$voltagem')");

    if ($result) {
      $response['mensagem'] = "Produto adicionado com sucesso";
    } else {
      $response['erro'] = "Erro ao adicionar Produto: " . mysqli_error($conn);
    }
  }
}

// Envie a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
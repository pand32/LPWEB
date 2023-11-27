<?php
require_once("../mysqli_conexao.php");

$response = array(); // Crie um array para armazenar a resposta

if (isset($_POST)) {
  $desc = mysqli_real_escape_string($conn, $_POST['desc_cor']);

  if (empty($desc)) {
    $response['erro'] = "Descrição não pode ficar em branco";
  } else {
    $result = mysqli_query(
      $conn,
      "INSERT INTO cor (desc_cor) VALUES ('$desc')"
    );
    if ($result) {
      $response['mensagem'] = "Cor adicionado com sucesso";
    } else {
      $response['erro'] = "Erro ao adicionar Cor: " . mysqli_error($conn);
    }
  }

}

// Envie a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
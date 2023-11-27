<?php
require_once("../mysqli_conexao.php");

$response = array(); // Crie um array para armazenar a resposta

if(isset($_POST)){
  $nome_cliente = mysqli_real_escape_string($conn, $_POST['nome_cliente']);
  $data_nascimento = mysqli_real_escape_string($conn, $_POST['data_nascimento']);
  $data_cadastro = mysqli_real_escape_string($conn, $_POST['data_cadastro']);
  $cpf_cnpj = mysqli_real_escape_string($conn, $_POST['cpf_cnpj']);
  $genero = mysqli_real_escape_string($conn, $_POST['genero']);

  if(empty($nome_cliente)){
    $response['erro'] = "Nome do cliente não pode ficar em branco";
  } else {
    $result = mysqli_query($conn, 
      "INSERT INTO cliente (nome_cliente, data_nascimento, data_cadastro,
       cpf_cnpj, genero) VALUES ('$nome_cliente', '$data_nascimento',
        '$data_cadastro', '$cpf_cnpj', '$genero')");

    if ($result) {
      $response['mensagem'] = "Cliente adicionado com sucesso";
    } else {
      $response['erro'] = "Erro ao adicionar cliente: " . mysqli_error($conn);
    }
  }
}

// Envie a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>

<?php
require_once("../mysqli_conexao.php");

$response = array(); // Crie um array para armazenar a resposta

if(isset($_POST)){
    $id = mysqli_real_escape_string($conn, $_POST['id_cliente']);
    $nome_cliente = mysqli_real_escape_string($conn, $_POST['nome_cliente']);
    $data_nascimento = mysqli_real_escape_string($conn, $_POST['data_nascimento']);
    $cpf_cnpj = mysqli_real_escape_string($conn, $_POST['cpf_cnpj']);
    $genero = mysqli_real_escape_string($conn, $_POST['genero']);
  
    if(empty($nome_cliente)) {
        $response['erro'] = "Nome do cliente não pode ficar em branco";
    } else {
        $result = mysqli_query($conn, "UPDATE cliente SET nome_cliente='$nome_cliente', data_nascimento='$data_nascimento',
        cpf_cnpj='$cpf_cnpj', genero='$genero' WHERE id_cliente=$id");
        $response['mensagem'] = "Cliente atualizado";
    }
}

// Envie a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>

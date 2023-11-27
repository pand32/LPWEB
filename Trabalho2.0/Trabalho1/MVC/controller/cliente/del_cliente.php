<?php
require_once("../mysqli_conexao.php");

$response = array(); // Crie um array para armazenar a resposta

$id = $_GET['id_cliente'];

$result = mysqli_query($conn, "DELETE FROM cliente WHERE id_cliente = $id");
$response['mensagem'] = "Cliente excluida com sucesso";


// Envie a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>

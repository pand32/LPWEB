<?php
require_once("../mysqli_conexao.php");

$response = array(); // Crie um array para armazenar a resposta

if(isset($_POST)){
    $id = mysqli_real_escape_string($conn, $_POST['id_cor']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc_cor']);

    if(empty($desc)) {
        $response['erro'] = "Cor precisa ser preenchida";
    } else {
        $result = mysqli_query($conn, "UPDATE cor SET desc_cor='$desc' WHERE id_cor=$id");
        if ($result) {
            $response['mensagem'] = "Cor atualizada com sucesso";
          } else {
            $response['erro'] = "Erro ao atualizar Cor: " . mysqli_error($conn);
          }
    }
}

// Envie a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
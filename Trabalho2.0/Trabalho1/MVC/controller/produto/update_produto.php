<?php
require_once("../mysqli_conexao.php");
$response = array(); // Crie um array para armazenar a resposta

if(isset($_POST)){
    $id_produto = mysqli_real_escape_string($conn, $_POST['id_produto']);
    $desc_produto = mysqli_real_escape_string($conn, $_POST['desc_produto']);
    $capacidade = mysqli_real_escape_string($conn, $_POST['capacidade']);
    $vlr_sugerido = mysqli_real_escape_string($conn, $_POST['vlr_sugerido']);
    $vlr_custo = mysqli_real_escape_string($conn, $_POST['vlr_custo']);
    $voltagem = mysqli_real_escape_string($conn, $_POST['voltagem']);

    if(empty($desc_produto)) {
        $response['erro'] =  "Produto precisa ser preenchido";
    } else {
        $result = mysqli_query($conn, "UPDATE produto SET desc_produto='$desc_produto' WHERE id_produto=$id_produto");
        if ($result) {
            $response['mensagem'] = "Produto atualizado";
          } else {
            $response['erro'] = "Erro ao atualizarProduto: " . mysqli_error($conn);
        }
    }
}

// Envie a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
<?php
require_once("../mysqli_conexao.php");

$id = $_GET['id_venda'];

$carrinho = mysqli_query($conn, "SELECT iv.id_produto, iv.qtd_venda, p.desc_produto, p.vlr_sugerido
FROM item_venda iv
INNER JOIN produto p ON iv.id_produto = p.id_produto
WHERE iv.id_venda = $id;");

// Verifica se a consulta foi bem-sucedida
if ($carrinho) {
    // Inicializa um array para armazenar os resultados
    $resultados = array();

    // Loop através dos resultados e adiciona-os ao array
    while ($row = mysqli_fetch_assoc($carrinho)) {
        $resultados[] = $row;
    }

    // Converte o array para JSON e imprime
    echo json_encode($resultados);
} else {
    // Se a consulta falhar, imprime uma mensagem de erro
    echo "Erro na consulta: " . mysqli_error($conn);
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>

<?php
require_once("../mysqli_conexao.php");

$id = $_GET['id_produto'];

$result = mysqli_query($conn, "DELETE FROM PRODUTO WHERE id_produto = $id");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Produto excluido</title>
    </head>
    <body>
        <p>Produto excluido!</p>
        <p><a href="../../view/produto/read_produto.php">Voltar para lista de produtos</a></p>
    </body>
</html>
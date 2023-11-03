<?php
require_once("mysqli_conexao.php");

$id = $_GET['id_produto'];

$result = mysqli_query($conn, "DELETE FROM PRODUTO WHERE id_produto = $id");
?>
<html>
    <head>
        <title>Produto excluido</title>
    </head>
    <body>
        <p>Produto excluido!</p>
        <p><a href="read_produto.php">Voltar para lista de produtos</a></p>
    </body>
</html>
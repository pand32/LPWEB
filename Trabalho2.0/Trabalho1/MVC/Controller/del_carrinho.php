<?php
require_once("../mysqli_conexao.php");

$id = $_GET['id_produto'];

$result = mysqli_query($conn, "DELETE FROM  WHERE ");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Caarrinho</title>
    </head>
    <body>
        <p>Produto removido do carrinho</p>
        <p><a href="../../view/cor/del_carrinho.php">Voltar ao carrinho</a></p>
    </body>
</html>


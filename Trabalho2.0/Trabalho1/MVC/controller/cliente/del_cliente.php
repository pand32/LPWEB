<?php
require_once("../mysqli_conexao.php");

$id = $_GET['id_cliente'];

$result = mysqli_query($conn, "DELETE FROM cliente WHERE id_cliente = $id");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cliente excluido</title>
    </head>
    <body>
        <p>Cliente excluido!</p>
        <p><a href="../../view/cliente/read_cliente.php">Voltar para lista de clientes</a></p>
    </body>
</html>
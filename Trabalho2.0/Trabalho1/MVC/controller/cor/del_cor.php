<?php
require_once("../mysqli_conexao.php");

$id = $_GET['id_cor'];

$result = mysqli_query($conn, "DELETE FROM cor WHERE id_cor = $id");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cor excluida</title>
    </head>
    <body>
        <p>Cor excluida!</p>
        <p><a href="../../view/cor/read_cor.php">Voltar para lista de cores</a></p>
    </body>
</html>


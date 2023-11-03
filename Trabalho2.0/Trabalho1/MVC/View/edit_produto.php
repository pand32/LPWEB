<?php
    require_once("mysqli_conexao.php");

    $id_produto = $_GET['id_produto'];

    $result = mysqli_query($conn, "SELECT * FROM PRODUTO WHERE id_produto=$id_produto");
    $resultData = mysqli_fetch_assoc($result);

    $desc = $resultData['nome_produto'];
?>
<html>
    <head>
        <title>Editando Produto</title>
    </head>
    <body>
        <h2>Editando Produto</h2>
            <p>
                <a href="read_produto.php">Voltar para lista de produtos</a>
            </p>

    <form name="edit" method="post" action="update_produto.php">
        <p>Descrição do Produto</p>
            <input type="text" name="desc_produto" value="<?php echo $desc_produto; ?>">
            <input type="hidden" name="id_produto" value="<?php echo $id_produto ?>">

        <p>Capacidade</p>
            <input type="text" name="capacidade">

        <p>Valor Sugerido</p>
            <input type="text" name="vlr_sugerido">

        <p>Valor de Custo</p>
            <input type="text" name="vlr_custo">

        <p>Voltagem</p>
            <input type="text" name="voltagem">

                <input type="submit" name="update" value="Atualizar">

                
    </form>



    </body>
</html>
    
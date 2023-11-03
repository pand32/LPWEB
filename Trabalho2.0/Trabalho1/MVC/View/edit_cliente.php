<?php
    require_once("mysqli_conexao.php");

    $id = $_GET['id_cliente'];

    $result = mysqli_query($conn, "SELECT * FROM cliente WHERE id_cliente=$id");
    $resultData = mysqli_fetch_assoc($result);

    $desc = $resultData['nome_cliente'];
?>
<html>
    <head>
        <title>Editando Cliente</title>
    </head>
    <body>
        <h2>Editando Cliente</h2>
            <p>
                <a href="read_cliente.php">Voltar para lista de cliente</a>
            </p>

    <form name="edit" method="post" action="update_cliente.php">
        <p>Nome do Cliente</p>
            <input type="text" name="nome_cliente" value="">
            <input type="hidden" name="id_cliente" value="<?php echo $id ?>">

        <p>Data de Nascimento</p>
            <input type="date" name="data_nascimento">

        <p>Data de Cadastro</p>
            <input type="date" name="data_cadastro">

        <p>CPF ou CNPJ</p>
            <input type="text" name="cpf_cnpj">

        <p>Gênero</p>
            <select name="genero">
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outro">Outro</option>
            </select>

                <input type="submit" name="update" value="Atualizar">
    </form>



    </body>
</html>

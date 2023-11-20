<?php
require_once("../../controller/mysqli_conexao.php");

$id = $_GET['id_cliente'];

$result = mysqli_query($conn, "SELECT * FROM cliente WHERE id_cliente=$id");
$resultData = mysqli_fetch_assoc($result);

$desc = $resultData['nome_cliente'];
$data_nascimento = $resultData['data_nascimento'];
$cpf_cnpj = $resultData['cpf_cnpj'];
$genero = $resultData['genero'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando Cliente</title>
    <link rel="stylesheet" href="cliente.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img id="logo" src="../img/logo.png" alt="">
                <div id="logoT">O Rei do Micro-ondas</div>
            </div>
            <div class="link" id="index"><a href="../index.html">Início</a></div>
            <div class="link" id="empresa"><a href="../empresa.html">Empresa</a></div>
            <div class="link" id="contato"><a href="../contato.html">Contato</a></div>
        </div>
        <h2 id='titulo'>Editando Cliente</h2>
        <div>
            <table class='new'>
                <tr>
                    <p>
                        <td><a href="read_cliente.php">Voltar para lista de cliente</a></td>
                    </p>
                </tr>
            </table>
        </div>
        <div class='form'>
            <form name="edit" method="post" action="../../controller/cliente/update_cliente.php">
                <p>Nome do Cliente</p>
                <input type="text" name="nome_cliente" value="<?php echo $desc ?>">
                <input type="hidden" name="id_cliente" value="<?php echo $id ?>">

                <p>Data de Nascimento</p>
                <input type="date" name="data_nascimento" value="<?php echo $data_nascimento ?>">

                <p>CPF ou CNPJ</p>
                <input type="text" name="cpf_cnpj" value="<?php echo $cpf_cnpj ?>">

                <p>Gênero</p>
                <select name="genero" value="<?php echo $genero ?>">
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro</option>
                </select><br><br>
                <input type="submit" name="update" value="Atualizar">
            </form>
        </div>
    </div>

</body>

</html>
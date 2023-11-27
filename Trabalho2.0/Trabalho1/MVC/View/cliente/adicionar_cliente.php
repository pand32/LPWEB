<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Cliente</title>
    <link rel="stylesheet" href="cliente.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="cliente.js"></script>
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
        <div>
            <h2 id='titulo'>Novo Cliente</h2>
            <table class='new'>
                <tr>
                    <p>
                        <td><a href="read_cliente.php">Voltar para lista de cliente</a></td>
                    </p>
                </tr>
            </table>
        </div>
        <div class='form'>
            <form id="addForm" action="../../controller/cliente/create_cliente.php" method="post" name="add">
                <p>Nome Cliente</p>
                <input type="text" name="nome_cliente">

                <p>Data de Nascimento</p>
                <input type="date" name="data_nascimento">

                <p>Data de Cadastro</p>
                <input type="date" name="data_cadastro">

                <p>Cpf ou Cnpj</p>
                <input type="text" name="cpf_cnpj">

                <p>Gênero</p>
                <select name="genero">
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro</option>
                </select>
                <br>
                <br>

                <input id="submit" type="submit" name="submit" value="Adicionar">
            </form>
        </div>
        <div id="modal">
            <div id="resposta"></div>
            <input id="button" type="button" value="OK" onclick="Click()">
        </div>
    </div>
</body>
</html>

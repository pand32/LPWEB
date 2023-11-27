<?php
require_once("../../controller/mysqli_conexao.php");

$id_produto = $_GET['id_produto'];

$result = mysqli_query($conn, "SELECT * FROM produto WHERE id_produto=$id_produto");
$resultData = mysqli_fetch_assoc($result);

$desc_produto = $resultData['desc_produto'];
$id_produto = $resultData['id_produto'];
$capacidade = $resultData['capacidade'];
$vlr_sugerido = $resultData['vlr_sugerido'];
$vlr_custo = $resultData['vlr_custo'];
$voltagem = $resultData['voltagem'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando Produto</title>  
    <link rel="stylesheet" href="produto.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="produto.js"></script>

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

        <h2 id='titulo'>Editando Produto</h2>
        <div>
            <table class='new'>
                <tr>
                    <p>
                        <td><a href="read_produto.php">Voltar para lista de produtos</a></td>
                    </p>
            </table>
        </div>

        <div class='form'>

            <form id="addForm" name="edit" method="post" action="../../controller/produto/update_produto.php">
                <p>Descrição do Produto</p>
                <input type="text" name="desc_produto" value="<?php echo $desc_produto; ?>">
                <input type="hidden" name="id_produto" value="<?php echo $id_produto ?>">

                <p>Capacidade</p>
                <input type="text" name="capacidade" value="<?php echo $capacidade; ?>">

                <p>Valor Sugerido</p>
                <input type="text" name="vlr_sugerido" value="<?php echo $vlr_sugerido; ?>">

                <p>Valor de Custo</p>
                <input type="text" name="vlr_custo" value="<?php echo $vlr_custo; ?>">

                <p>Voltagem</p>
                <input type="text" name="voltagem" value="<?php echo $voltagem; ?>">
                <br><br>
                <input id="submit" type="submit" name="update" value="Atualizar">
            </form>
        </div>
        
        <div id="modal">
            <div id="resposta"></div>
            <input id="button" type="button" value="OK" onclick="Click()">
        </div>
    </div>
</body>

</html>
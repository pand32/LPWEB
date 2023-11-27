<?php
require_once("../controller/mysqli_conexao.php");
$result = mysqli_query($conn, "SELECT * FROM produto");
$resultCarrinho = mysqli_query($conn, "SELECT * FROM produto");


date_default_timezone_set('America/Sao_Paulo');
$dataAtualFormatada = date('d/m/Y');

$resultId = mysqli_query(
    $conn,
    "INSERT INTO venda (data_venda, nr_documento, id_cliente, status_venda, prc_desconto, id_vendedor) VALUES (
    '$dataAtualFormatada', 11111111111, 1, 'ativo', 1, 1)"
);

// Obtém o ID inserido  
$Id = mysqli_insert_id($conn);

$carrinho = mysqli_query($conn, "SELECT iv.id_produto, iv.qtd_venda, p.desc_produto, p.vlr_sugerido
FROM item_venda iv
INNER JOIN produto p ON iv.id_produto = p.id_produto
WHERE iv.id_venda = $Id;");

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Micro-Ondas</title>
    <link rel="stylesheet" href="produtos.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="produtos.js"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img id="logo" src="img/logo.png" alt="">
                <div id="logoT">O Rei do Micro-ondas</div>
            </div>
            <div class="link" id="index"><a href="index.html">Início</a></div>
            <div class="link" id="empresa"><a href="empresa.html">Empresa</a></div>
            <div class="link" id="contato"><a href="contato.html">Contato</a></div>
        </div>
        <div class="produtos">
            <?php
            while ($res = mysqli_fetch_assoc($result)) {
                echo "<div class='produto'> 
                        <div class='boxImg'>
                            <img id='img' src='img/microondas/microondas$res[id_produto].png' alt=''>
                        </div>
                        <div class='boxText'>
                            $res[desc_produto]
                        </div>
                        <div>
                            <div class = 'preco'>
                                <p>capacidade: $res[capacidade]<br> $res[voltagem]v </p>
                                <p>R$:$res[vlr_sugerido] em 10x R$" . ($res['vlr_sugerido'] / 10) . " sem juros</p>
                                
                                <form class='addForm' action='../controller/carrinho/adicionar_carrinho.php' method='post' name='add'>
                                <input type='hidden' name='id_venda' value='$Id'>
                                <input type='hidden' name='id_produto' value='$res[id_produto]'>
                                <input type='hidden' name='vlr_venda' value='$res[vlr_sugerido]'>
                                <input id='qtd' type='number' name='qtd_venda' value=0 required min='0'>
                                <input id='buttonCompra' type='submit' name='submit' value='Comprar'>
                              </form>
                            </div>
                        </div>
                    </div>";
            }
            ?>
        </div>
        <input id="menuCompras" type="checkbox">
        <label for="menuCompras">
            <div id="carrinho">
                <img id="img" src="img/compras.png" alt="">
            </div>
        </label>
        <div id=listaCompras>
            <table id=tabelaCompras>
                <thead>
                    <tr gbcolor='#DDDDDD'>
                        <th>Imagem</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>qtd</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($res = mysqli_fetch_assoc($carrinho)) {
                        echo "<tr>";
                        echo "<td>" . $res['id_produto'] . "</td>";
                        echo "<td>" . $res['desc_produto'] . "</td>";
                        echo "<td>" . $res['vlr_sugerido'] . "</td>";
                        echo "<td>" . $res['qtd_venda'] . "</td>";
                        echo "<td> <a href='#' onClick= 'Delete($res[id_produto], $Id)' >Deletar</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <input id="Comprar" type="button" value="Fechar Compra" onclick="Fechar('<?php echo $Id; ?>')">
        </div>
        <div id="modal">
            <div id="resposta"></div>
            <input id="button" type="button" value="OK" onclick="Click('<?php echo $Id; ?>')">
        </div>
        <footer class="footer"></footer>
    </div>
</body>

</html>
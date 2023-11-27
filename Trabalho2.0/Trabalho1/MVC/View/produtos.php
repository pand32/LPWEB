<?php
require_once("../controller/mysqli_conexao.php");
$result = mysqli_query($conn, "SELECT * FROM produto");
$resultCarrinho = mysqli_query($conn, "SELECT * FROM produto");

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Micro-Ondas</title>
    <link rel="stylesheet" href="produtos.css">
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
                                <input id='button' type='button' value='Comprar' onclick= 'carrinho()'>
                            </div>
                        </div>
                    </div>";
            }
            ?>
        </div>
        <input id="menuCompras" type="checkbox">
        <label for="menuCompras">
            <div id="carrinho">
                <img id="img" src="img/compras.png" alt="" onclick="carrinho()">
            </div>
        </label>
        <input type="button" >
        <div id=listaCompras>
            <table id=tabelaCompras>
                <thead>
                    <tr gbcolor='#DDDDDD'>
                        <th>Imagem</th>
                        <th>Produto</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>
                            aaa
                        </td>
                        <td>
                            aaaa
                        </td>
                        <td>
                            aaaa
                        </td>
                    </tr>
                    <tr>
                        <td>
                            aaa
                        </td>
                        <td>
                            aaaa
                        </td>
                        <td>
                            aaaa
                        </td>
                    </tr>
                </tbody>
            </table>
            <input id="Comprar" type="button" value="Fechar Compra" onclick="ClickD()">
        </div>
        <footer class="footer"></footer>
    </div>
</body>

</html>
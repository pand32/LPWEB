<?php
require_once("../../controller/mysqli_conexao.php");
$result = mysqli_query($conn, "SELECT * FROM produto");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Produto</title>
  <link rel="stylesheet" href="produto.css">


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
    <h2 id='titulo'>CADASTRO DE PRODUTOS</h2>
    <div>
      <table class='new'>
        <tr>
          <p>
            <td>
              <a href="adicionar_produto.php">Novo Produto</a>
            </td>
          </p>
      </table>

      <table class='tabela'>
        <thead>
          <tr gbcolor='#DDDDDD'>
            <th>Descrição</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($res = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $res['desc_produto'] . "</td>";
            echo "<td><a href='edit_produto.php?id_produto=$res[id_produto]'>Editar</a>|
                   <a href='../../controller/produto/del_produto.php?id_produto=$res[id_produto]' 
                  onClick=\"return confirm('Tem certeza?')\">Deletar</a></td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>

    </div>
  </div>

</body>

</html>
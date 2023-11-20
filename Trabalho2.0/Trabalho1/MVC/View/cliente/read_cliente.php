<?php
require_once("../../controller/mysqli_conexao.php");
$result = mysqli_query($conn, "SELECT * FROM cliente");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Cliente</title>
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
    <h2 id='titulo'>CADASTRO DE CLIENTE</h2>
    <div>
      <table class='new'>
        <tr>
          <p>
            <td><a href="adicionar_cliente.php">Novo Cliente</a></td>
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
            echo "<td>" . $res['nome_cliente'] . "</td>";
            echo "<td><a href='edit_cliente.php?id_cliente=$res[id_cliente]'>Editar</a>|
                    <a href='../../controller/cliente/del_cliente.php?id_cliente=$res[id_cliente]' 
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
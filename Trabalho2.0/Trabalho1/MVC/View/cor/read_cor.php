<?php
require_once("../../controller/mysqli_conexao.php");
$result = mysqli_query($conn, "SELECT * FROM cor");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Cores</title>
  <link rel="stylesheet" href="cor.css">
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
    <h2 id='titulo'>CADASTRO DE CORES</h2>
    <div>
      <table class='new'>
        <tr>
          <p>
            <td><a href="adicionar_cor.php">Nova Cor</a></td>
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
            echo "<td>" . $res['desc_cor'] . "</td>";
            echo "<td><a href='edit_cor.php?id_cor=$res[id_cor]'>Editar</a>|
                   <a href='../../controller/cor/del_cor.php?id_cor=$res[id_cor]' 
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
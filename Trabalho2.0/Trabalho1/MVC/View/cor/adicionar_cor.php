<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nova Cor</title>
  <link rel="stylesheet" href="cor.css">

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="cor.js"></script>

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

    <h2 id='titulo'>Nova Cor</h2>
    <div>
      <table class='new'>
        <tr>
          <p>
            <td><a href="read_cor.php">Voltar</a></td>
          </p>

      </table>
    </div>

    <div class='form'>
      <form id="addForm" action="../../controller/cor/create_cor.php" method="post" name="add">
        <p>Descrição</p>
        <input type="text" name="desc_cor">
        <br>
        <br>
        <input id="submit" type="submit" name="submit" value="Adicionar">
        <br>

      </form>
    </div>
    <div id="modal">
      <div id="resposta"></div>
      <input id="button" type="button" value="OK" onclick="Click()">
    </div>
  </div>

</body>

</html>
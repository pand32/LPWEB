<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Novo Produto</title>
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

    <h2 id='titulo'>Novo Produto</h2>
    <div>
      <table class='new'>
        <tr>
          <p>
            <td><a href="read_produto.php">Voltar para lista de produtos</a></td>
          </p>
      </table>
    </div>
    <div class='form'>

      <form action="../../controller/produto/create_produto.php" method="post" name="add">
        <p>Descrição</p>
        <input type="text" name="desc_produto">
        <p>Capacidade</p>
        <input type="text" name="capacidade">
        <p>Valor Sugerido</p>
        <input type="text" name="vlr_sugerido">
        <p>Valor de Custo</p>
        <input type="text" name="vlr_custo">
        <p>Voltagem</p>
        <input type="text" name="voltagem">
        <input type="submit" name="submit" value="Adicionar">
      </form>
    </div>
  </div>

</body>

</html>
<html>
  <head>
    <title>Novo Produto</title>
  </head>
  <body>
    <h2>Novo Produto</h2>
    <p><a href="read_produto.php"></a></p>
    <form action="create_produto.php" method="post" name="add">
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
     <a href='read_produto.php'>Voltar à tela anterior</a>;
</body>
</html>
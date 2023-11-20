<html>
  <head>
    <title>Adicionando Produto</title>
  </head>
<body>    
<?php
require_once("mysqli_conexao.php");

if(isset($_POST['submit'])){
  $desc_produto = mysqli_real_escape_string($conn, $_POST['desc_produto']);
  
  if (empty($desc_produto)){
        echo "<font color = 'red'>Descrição não pode ficar em branco</font><br/>";
    } else {
        $result = mysqli_query($conn,"INSERT INTO produto (desc_produto) VALUES ('$desc_produto')");
        echo "<p><font color='green'>Produto adicionado</p>";
    }
    echo "<a href='adicionar_produto.php'>Voltar à tela anterior</a>";
}
?>
</body>
</html>
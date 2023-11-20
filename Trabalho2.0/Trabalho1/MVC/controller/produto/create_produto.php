<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionando Produto</title>
  </head>
<body>    
<?php
require_once("../mysqli_conexao.php");

if(isset($_POST['submit'])){
  $desc_produto = mysqli_real_escape_string($conn, $_POST['desc_produto']);
  $capacidade = mysqli_real_escape_string($conn, $_POST['capacidade']);
  $vlr_sugerido = mysqli_real_escape_string($conn, $_POST['vlr_sugerido']);
  $vlr_custo = mysqli_real_escape_string($conn, $_POST['vlr_custo']);
  $voltagem = mysqli_real_escape_string($conn, $_POST['voltagem']);
  
  if (empty($desc_produto)){
        echo "<font color = 'red'>Descrição não pode ficar em branco</font><br/>";
    } else {
        $result = mysqli_query($conn,"INSERT INTO produto (desc_produto, capacidade,
         vlr_sugerido, vlr_custo, voltagem) VALUES ('$desc_produto', '$capacidade',
          '$vlr_sugerido', '$vlr_custo', '$voltagem')");
        echo "<p><font color='green'>Produto adicionado</p>";
    }
    echo "<a href='../../view/produto/adicionar_produto.php'>Voltar à tela anterior</a>";
}
?>
</body>
</html>
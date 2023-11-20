<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionando Cor</title>;;;
  </head>
<body>    
<?php
require_once("../mysqli_conexao.php");

if(isset($_POST['submit'])){
    $desc = mysqli_real_escape_string($conn, $_POST['desc_cor']);

    if(empty($desc)){
        echo "<font color = 'red'>Descrição não pode ficar em branco</font><br/>";
    } else {
        $result = mysqli_query($conn, 
          "INSERT INTO cor (desc_cor) VALUES ('$desc')");
        echo "<p><font color='green'>Cor adicionada</p>";
    }
    echo "<a href='../../view/cor/adicionar_cor.php'>Voltar à tela anterior</a>";
}
?>
</body>
</html>
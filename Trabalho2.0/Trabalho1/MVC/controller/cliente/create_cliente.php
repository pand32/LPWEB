<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionando Cliente</title>
  </head>
<body> 
     
<?php
require_once("../mysqli_conexao.php");

if(isset($_POST['submit'])){
  $nome_cliente = mysqli_real_escape_string($conn, $_POST['nome_cliente']);
  $data_nascimento = mysqli_real_escape_string($conn, $_POST['data_nascimento']);
  $data_cadastro = mysqli_real_escape_string($conn, $_POST['data_cadastro']);
  $cpf_cnpj = mysqli_real_escape_string($conn, $_POST['cpf_cnpj']);
  $genero = mysqli_real_escape_string($conn, $_POST['genero']);

    if(empty($nome_cliente)){
        echo "<font color = 'red'>Descrição não pode ficar em branco</font><br/>";
    } else {
        $result = mysqli_query($conn, 
          "INSERT INTO cliente (nome_cliente, data_nascimento, data_cadastro,
           cpf_cnpj, genero) VALUES ('$nome_cliente', '$data_nascimento',
            '$data_cadastro', '$cpf_cnpj', '$genero')");
        echo "<p><font color='green'>Cliente adicionado</p>";
    }
    echo "<a href='../../view/cliente/adicionar_cliente.php'>Voltar à tela anterior</a>";
}
?>
</body>
</html>
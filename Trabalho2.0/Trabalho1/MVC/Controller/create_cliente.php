<html>
  <head>
    <title>Adicionando Cliente</title>
  </head>
<body>    
<?php
require_once("mysqli_conexao.php");

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
          "INSERT INTO Cliente (nome_cliente) VALUES ('$nome_cliente')");
        echo "<p><font color='green'>Cliente adicionado</p>";
    }
    echo "<a href='adicionar_cliente.php'>Voltar à tela anterior</a>";
}
?>
</body>
</html>
<?php
require_once("../../controller/mysqli_conexao.php");

$id = $_GET['id_cor'];

$result = mysqli_query($conn, "SELECT * FROM cor WHERE id_cor =$id");
$resultData = mysqli_fetch_assoc($result);

$desc = $resultData['desc_cor'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editando cor</title>
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
    <div>
      <h2 id='titulo'>Novo Cliente</h2>
      <table class='new'>
        <tr>
          <p>
            <td><a href="read_cor.php">Voltar para lista de cores</a>
          </p>
        </tr>
      </table>
    </div>
    <div class='form'>

      <form name="edit" method="post" action="../../controller/cor/update_cor.php">
        <p>Descricao</p>
        <input type="text" name="desc_cor" value=<?php echo $desc ?>>
        <input type="hidden" name="id_cor" value=<?php echo $id ?>>
        <input type="submit" name="update" value="Atualizar">

        <br>
        <br>
      </form>
    </div>
  </div>

</body>

</html>
<?php
require_once("../mysqli_conexao.php");

$id = $_GET['id_produto'];

function adicionarCarrinho($id) {
    if(isset($_POST['submit'])){
        $desc = mysqli_real_escape_string($conn, $_POST['']);
    
        if(empty($desc)){
            echo "<font color = 'red'>O carrinho não pode ficar vazio</font><br/>";
        } else {
            $result = mysqli_query($conn, 
              "INSERT INTO carrinho VALUES '')");
            echo "<p><font color='green'>Produto adicionado ao carrinho</p>";
        }
        echo "<a href='../../view/cor/adicionar_cor.php'>Voltar à tela anterior</a>";
    }
}

?>
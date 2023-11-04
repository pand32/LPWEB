<?php
require_once("mysqli_conexao.php");

if(isset($_POST['update'])){
    $id_produto = mysqli_real_escape_string($conn, $_POST['id_produto']);
    $desc_produto = mysqli_real_escape_string($conn, $_POST['desc_produto']);
    $capacidade = mysqli_real_escape_string($conn, $_POST['capacidade']);
    $vlr_sugerido = mysqli_real_escape_string($conn, $_POST['vlr_sugerido']);
    $vlr_custo = mysqli_real_escape_string($conn, $_POST['vlr_custo']);
    $voltagem = mysqli_real_escape_string($conn, $_POST['voltagem']);

    if(empty($desc_produto)) {
        echo "<font color='red'>Produto precisa ser preenchido</font>";
    } else {
        $result = mysqli_query($conn, "UPDATE produto SET desc_produto='$desc_produto' WHERE id_produto=$id_produto");
        echo "<font color='green'>Produto atualizado";
    }
    echo "<a href='read_produto.php'>Voltar para a lista de produtos";
}
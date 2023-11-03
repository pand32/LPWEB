<?php
require_once("mysqli_conexao.php");

if(isset($_POST['update'])){
    $id = mysqli_real_escape_string($conn, $_POST['id_cliente']);
    $nome_cliente = mysqli_real_escape_string($conn, $_POST['nome_cliente']);
    $data_nascimento = mysqli_real_escape_string($conn, $_POST['data_nascimento']);
    $data_cadastro = mysqli_real_escape_string($conn, $_POST['data_cadastro']);
    $cpf_cnpj = mysqli_real_escape_string($conn, $_POST['cpf_cnpj']);
    $genero = mysqli_real_escape_string($conn, $_POST['genero']);

    if(empty($desc)) {
        echo "<font color='red'>Cliente precisa ser preenchido</font>";
    } else {
        $result = mysqli_query($conn, "UPDATE cliente SET nome_cliente='$nome_cliente' WHERE id_cliente=$id");
        echo "<font color='green'>Cliente atualizado";
    }
    echo "<a href='read_cliente.php'>Voltar para a lista de cliente";
}
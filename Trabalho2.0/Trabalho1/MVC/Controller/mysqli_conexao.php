<?php
$servidor='localhost';
$usuario= 'root';
$senha='';
$bancodedados='bd2_uniandrade';



    $conn = mysqli_connect($servidor,
                       $usuario,
                       $senha,
                       $bancodedados);
// validando a conexao
if (!$conn){
    die("Conexão falhou:" . mysqli_connect_error());
}
//echo "Banco de dados conectado";

?>
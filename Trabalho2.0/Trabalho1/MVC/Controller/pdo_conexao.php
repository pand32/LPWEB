<?php
$servername='localhost';
$database= 'bd2_uniandrade';
$username ='root';
$bancodedados='';

try {
    $conn = new POD("mysql:host=$servername;dbname=$database", $username,$password);
    echo "Conectado a $database em $servername com sucesso usando PDO.";
    $mensagem = "Drivers disponiveis:". implode(",",PDO ::getAvailableDrivers());
    throw new Exception ($mensagem);
}
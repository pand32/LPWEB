<?php

class Cliente {
    // atributos
    private int $id_cliente;
    private string $nome_cliente;
    private string $dataNascimetno;
    private string $dataCadastro;
    private string $cpf_cnpj;
    private string $genero;
    private string $origem;


    // metodos
    // Construtor
    
    // Construtor com valores pre-estabelecidos vazios
    function __construct(){
        $this->id_cliente = 0;
        $this->nome_cliente = "";
        $this->dataNascimento = "";
        $this->dataCadastro = "";
        $this->cpf_cnpj = "";
        $this->genero = "";
        $this->origem = "";

        echo "Criei um objeto da classe Cliente "._CLASS_;
    }

    // Gets
    function GetId(){
        return $this->id_cliente;
    }

    // Sets
    function SetId(int $pId){
        $this->id_cliente = $pId;
    }
    
    function GetNome(){
        return $this->nome_cliente;
    }

    function SetNome(string $pNome){
        $this->nome_cliente = $pNome;
    }

    function GetNascimento(){
        return $this->dataNascimento;
    }

    function SetNascimento(string $pNascimento){
        $this->dataNascimento = $pNascimento;
    }
    function GetCadastro(){
        return $this->dataCadastro;
    }

    function SetCadastro(string $pCadastro){
        $this->dataCadastro = $pCadastro;
    }
    function GetCpf(){
        return $this->cpf_cnpj;
    }
    function SetCpf(string $Cpf){
        $this->cpf_cnpj = $pCpf;
    }
    function GetGenero(){
        return $this->genero;
    }
    function SetGenero(string $Genero){
        $this->genero= $pGenero;
    }
    function GetOrigem(){
        return $this->origem;
    }
    function SetOrigem(string $Origem){
        $this->origem= $pOrigem;
    }
    
}
    


// Criando primeiro objeto da classe usando a palavra reservada NEW
$cliente1 = new Cliente;
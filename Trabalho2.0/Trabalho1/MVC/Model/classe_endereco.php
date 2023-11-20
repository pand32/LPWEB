<?php

class Endereco {
    // atributos
    private int $id_endereco;
    private int $id_cliente;
    private string $logradouro;
    private string $numero;
    private string $complemento;
    private string $cep;
    private string $bairro;
    private string $cidade;
    private string $estado;
    private string $tipo;


    // metodos
    // Construtor
    
    // Construtor com valores pre-estabelecidos vazios
    function __construct(){
        $this->id_endereco = 0;
        $this->id_cliente = 0;
        $this->logradouro = "";
        $this->numero = "";
        $this->complemento = "";
        $this->cep = "";
        $this->bairro = "";
        $this->cidade = "";
        $this->estado = "";
        $this->tipo = "";

        echo "Criei um objeto da classe Endereço "._CLASS_;
    }

    // Gets
    function GetId_endereco(){
        return $this->id_endereco;
    }

    // Sets
    function SetId_endereco(int $pId_endereco){
        $this->id_endereco = $pId_endereco;
    }
    
    function GetId_cliente(){
        return $this->id_cliente;
    }

    function SetId_cliente(int $pId_cliente){
        $this->id_cliente = $pId_cliente;
    }

    function GetLogradouro(){
        return $this->logradouro;
    }

    function SetLogradouroo(string $pLogradouro){
        $this->logradouro = $pLogradouro;
    }

    function GetNumero(){
        return $this->numero;
    }

    function SetNumero(string $pNumero){
        $this->numero = $pNumero;
    }

    function GetComplemento(){
        return $this->complemento;
    }

    function SetComplemento(string $Complemento){
        $this->complemento = $pComplemento;
    }

    function GetCep(){
        return $this->cep;
    }

    function SetCep(string $Cep){
        $this->cep= $pCep;
    }

    function GetBairro(){
        return $this->bairro;
    }

    function SetBairro(string $Bairro){
        $this->bairro= $pBairro;
    }

    function GetCidade(){
        return $this->cidade;
    }

    function SetCidade(string $Cidade){
        $this->cidade= $pCidade;
    }

    function GetEstado(){
        return $this->estado;
    }

    function SetEstado(string $Estado){
        $this->estado= $pEstado;
    }

    function GetTipo(){
        return $this->tipo;
    }

    function SetTipo(string $Tipo){
        $this->tipo= $pTipo;
    }
    
}

// Criando primeiro objeto da classe usando a palavra reservada NEW
$endereco = new Endereco;

<?php

class Vendas {
    // atributos
    private int $id_venda;
    private string $data_venda;
    private int $nr_documento;
    private int $id_cliente;
    private string $status_venda;
    private float $prc_desconto;
    private int $id_vendedor;
     
    // metodos
    // Construtor
    
    // Construtor com valores pre-estabelecidos vazios
    function __construct(){
        $this->id_venda = 0;
        $this->data_venda = "";
        $this->nr_documento = 0;
        $this->id_cliente = 0;
        $this->status_venda = "";
        $this->prc_desconto = 0.0;
        $this->id_vendedor = 0;

        echo "Criei um objeto da Vendas "._CLASS_;
    }

    // Gets
    function GetId_venda(){
        return $this->id_venda;
    }

    // Sets
    function SetId_venda(int $pId_venda){
        $this->id_venda = $pId_venda;
    }

    function GetData_venda(){
        return $this->data_venda;
    }

    function SetData_venda(string $pData_venda){
        $this->data_venda = $pData_venda;
    }

    function GetNr_documento(){
        return $this->nr_documento;
    }

    function SetNr_documento(int $pNr_documento){
        $this->nr_documento = $pNr_documento;
    }

    function GetId(){
        return $this->id_cliente;
    }

    function SetId(int $pId){
        $this->id_cliente = $pId;
    }

    function GetStatus_venda(){
        return $this->status_venda;
    }

    function SetStatus_venda(string $pStatus_venda){
        $this->status_venda = $pStatus_venda;
    }

    function GetPrc_desc(){
        return $this->prc_desc;
    }

    function SetPrc_desc(float $pPrc_desc){
        $this->prc_desc = $pPrc_desconto;
    }

    function GetId_vendedor(){
        return $this->id_vendedor;
    }

    // Sets
    function SetId_vendedor(int $pId_vendedor){
        $this->id_vendedor = $pId_vendedor;
    }


}

// Criando primeiro objeto da classe usando a palavra reservada NEW
$vendas = new Vendas;
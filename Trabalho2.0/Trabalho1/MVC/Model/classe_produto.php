<?php

class Produto {
   
    private int $id_produto;
    private string $desc_produto;
    private int $id_modelo;
    private float $capacidade;
    private float $vlr_sugerido;
    private float $vlr_custo;
    private string $voltagem;
    private int $id_cor;
     
    
    function __construct(){
        $this->id_produto = 0;
        $this->desc_produto = "";
        $this->id_modelo = 0;
        $this->capacidade = 0.0;
        $this->vlr_sugerido = 0.0;
        $this->vlr_custo = 0.0;
        $this->voltagem = "";
        $this->id_cor = 0;

        echo "Criei um objeto da classe Produto ".__CLASS__;
    }

    
    function GetId_produto(){
        return $this->id_produto;
    }

    
    function SetId_produto(int $pId_produto){
        $this->id_produto = $pId_produto;
    }

    function GetDesc_produto(){
        return $this->desc_produto;
    }

    
    function SetDesc_produto(string $pDesc_produto){
        $this->desc_produto = $pDesc_produto;
    }

    function GetId_modelo(){
        return $this->id_modelo;
    }

    
    function SetId_modelo(int $pId_modelo){
        $this->id_modelo = $pId_modelo;
    }

    function GetCapacidade(){
        return $this->capacidade;
    }

    
    function SetCapacidade(float $pCapacidade){
        $this->capacidade = $pCapacidade;
    }

    function GetVlr_sugerido(){
        return $this->vlr_sugerido;
    }

    
    function SetVlr_sugerido(float $pVlr_sugerido){
        $this->vlr_sugerido = $pVlr_sugerido;
    }

    function GetVlr_custo(){
        return $this->vlr_custo;
    }

    
    function SetVlr_custo(float $pVlr_custo){
        $this->vlr_custo = $pVlr_custo;
    }

    function GetVoltagem(){
        return $this->voltagem;
    }

    
    function SetVoltagem(string $pVoltagem){
        $this->voltagem = $pVoltagem;
    }

    function GetId_cor(){
        return $this->id_cor;
    }

    
    function SetId_cor(int $pId_cor){
        $this->id_cor = $pId_cor;
    }
}


$produto = new Produto;
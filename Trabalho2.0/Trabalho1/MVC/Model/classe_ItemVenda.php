<?php

class ItemVenda {
    // Atributos
    private int $id_item;
    private int $id_venda;
    private int $id_produto;
    private float $vlr_venda;
    private int $qnt_venda;
    private string $status_item_venda;

    // Construtor
    public function __construct() {
        $this->id_item = 0;
        $this->id_venda = 0;
        $this->id_produto = 0;
        $this->vlr_venda = 0.0;
        $this->qnt_venda = 0;
        $this->status_item_venda = "";
        echo "Criei um objeto da classe Item Venda" . __CLASS__;
    }

    // Métodos Get e Set
    public function getIdItem(): int {
        return $this->id_item;
    }

    public function setIdItem(int $id_item): void {
        $this->id_item = $id_item;
    }

    public function getIdVenda(): int {
        return $this->id_venda;
    }

    public function setIdVenda(int $id_venda): void {
        $this->id_venda = $id_venda;
    }

    public function getIdProduto(): int {
        return $this->id_produto;
    }

    public function setIdProduto(int $id_produto): void {
        $this->id_produto = $id_produto;
    }

    public function getValorVenda(): float {
        return $this->vlr_venda;
    }

    public function setValorVenda(float $vlr_venda): void {
        $this->vlr_venda = $vlr_venda;
    }

    public function getQuantidadeVenda(): int {
        return $this->qnt_venda;
    }

    public function setQuantidadeVenda(int $qnt_venda): void {
        $this->qnt_venda = $qnt_venda;
    }

    public function getStatusItemVenda(): string {
        return $this->status_item_venda;
    }

    public function setStatusItemVenda(string $status_item_venda): void {
        $this->status_item_venda = $status_item_venda;
    }
}

// Criando um objeto da classe ItemVenda
$itemVenda1 = new ItemVenda;
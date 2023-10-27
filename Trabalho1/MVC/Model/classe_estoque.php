<?php

class Estoque {
    // Atributos
    private int $id_estoque;
    private int $id_produto;
    private int $qt_estoque;
    private int $id_filial;

    // Construtor
    public function __construct() {
        $this->id_estoque = 0;
        $this->id_produto = 0;
        $this->qt_estoque = 0;
        $this->id_filial = 0;
        echo "Criei um objeto da classe " . __CLASS__;
    }

    // Métodos Get e Set
    public function getIdEstoque(): int {
        return $this->id_estoque;
    }

    public function setIdEstoque(int $id_estoque): void {
        $this->id_estoque = $id_estoque;
    }

    public function getIdProduto(): int {
        return $this->id_produto;
    }

    public function setIdProduto(int $id_produto): void {
        $this->id_produto = $id_produto;
    }

    public function getQtEstoque(): int {
        return $this->qt_estoque;
    }

    public function setQtEstoque(int $qt_estoque): void {
        $this->qt_estoque = $qt_estoque;
    }

    public function getIdFilial(): int {
        return $this->id_filial;
    }

    public function setIdFilial(int $id_filial): void {
        $this->id_filial = $id_filial;
    }
}

// Criando um objeto da classe Estoque
$estoque1 = new Estoque;
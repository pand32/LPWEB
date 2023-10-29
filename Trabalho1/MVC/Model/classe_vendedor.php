<?php

class Vendedor {
    // Atributos
    private int $id_vendedor;
    private string $nome_vendedor;
    private string $data_admissao;
    private string $data_demissao;
    private float $comissao;

    // Construtor
    public function __construct() {
        $this->id_vendedor = 0;
        $this->nome_vendedor = "";
        $this->data_admissao = "";
        $this->data_demissao = "";
        $this->comissao = 0.0;
        echo "Criei um objeto da classe Vendedor " . __CLASS__;
    }

    // Métodos Get e Set
    public function getIdVendedor(): int {
        return $this->id_vendedor;
    }

    public function setIdVendedor(int $id_vendedor): void {
        $this->id_vendedor = $id_vendedor;
    }

    public function getNome_vendedo(): string {
        return $this->nome_vendedor;
    }

    public function setNome_vendedor(string $nome_vendedor): void {
        $this->nome_vendedor = $nome_vendedor;
    }

    public function getData_admissao(): string {
        return $this->data_admissao;
    }

    public function setData_admissao(string $data_admissao): void {
        $this->data_admissao = $data_admissao;
    }

    public function getData_demissao(): string {
        return $this->data_demissao;
    }

    public function setData_demissao(string $data_demissao): void {
        $this->data_demissao = $data_demissao;
    }
    public function getComissao(): float {
        return $this->comissao;
    }

    public function setComissao(float $comissao): void {
        $this->comissao = $comissao;
    }
}

// Criando um objeto da classe Estoque
$vendedor = new Vendedor;
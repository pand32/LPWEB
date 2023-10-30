<?php

class Fone {
    // Atributos
    private int $id_fone;
    private int $id_cliente;
    private string $numero_fone;
    private string $tipo_fone;

    // Construtor
    public function __construct() {
        $this->id_fone = 0;
        $this->id_cliente = 0;
        $this->numero_fone = "";
        $this->tipo_fone = "";
        echo "Criei um objeto da classe Fone " . __CLASS__;
    }

    // Métodos Get e Set
    public function getIdFone(): int {
        return $this->id_fone;
    }

    public function setIdFone(int $id_fone): void {
        $this->id_fone = $id_fone;
    }

    public function getId_Cliente(): int {
        return $this->id_cliente;
    }

    public function setId_Cliente(int $id_cliente): void {
        $this->id_cliente = $id_cliente;
    }

    public function getNumero_fone(): string {
        return $this->numero_fone;
    }

    public function setNumero_fone(string $numero_fone): void {
        $this->numero_fone = $numero_fone;
    }

    public function getTipo_fone(): string {
        return $this->tipo_fone;
    }

    public function setTipo_fone(string $tipo_fone): void {
        $this->tipo_fone = $tipo_fone;
    }
}

// Criando um objeto da classe Estoque
$fone = new Fone;
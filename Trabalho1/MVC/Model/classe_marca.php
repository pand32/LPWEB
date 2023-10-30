<?php

class Marca {
    // Atributos
    private int $id_marca;
    private string $desc_marca;

    // Construtor
    public function __construct() {
        $this->id_marca = 0;
        $this->desc_marca = "";
        echo "Criei um objeto da classe " . __CLASS__;
    }

    // Métodos Get e Set
    public function getIdMarca(): int {
        return $this->id_marca;
    }

    public function setIdMarca(int $id_marca): void {
        $this->id_marca = $id_marca;
    }

    public function getDescMarca(): string {
        return $this->desc_marca;
    }

    public function setDescMarca(string $desc_marca): void {
        $this->desc_marca = $desc_marca;
    }
}

// Criando um objeto da classe Marca
$marca = new Marca;

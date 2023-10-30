<?php

class Linha {
    // Atributos
    private int $id_linha;
    private string $desc_linha;

    // Construtor
    public function __construct() {
        $this->id_linha = 0;
        $this->desc_linha = "";
        echo "Criei um objeto da classe " . __CLASS__;
    }

    // Métodos Get e Set
    public function getIdLinha(): int {
        return $this->id_linha;
    }

    public function setIdLinha(int $id_linha): void {
        $this->id_linha = $id_linha;
    }

    public function getDescLinha(): string {
        return $this->desc_linha;
    }

    public function setDescLinha(string $desc_linha): void {
        $this->desc_linha = $desc_linha;
    }
}

// Criando um objeto da classe Linha
$linha = new Linha;

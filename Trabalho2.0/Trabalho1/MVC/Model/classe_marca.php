<?php

class Marca {
    // Atributos
    private int $id_Marca;
    private string $desc_marca;
    
    // Construtor
    public function __construct() {
        $this->id_marca = 0;
        $this->desc_marca = "";
        
        echo "Criei um objeto da classe Marca " . __CLASS__;
    }

    // Métodos Get e Set
    public function getIdMarca(): int {
        return $this->id_marca;
    }

    public function setIdMarca(int $id_Marca): void {
        $this->id_marca = $id_Marca;
    }

    public function getDesc_Marca(): string {
        return $this->desc_marca;
    }

    public function setDesc_Marca(int $desc_marca): void {
        $this->desc_marca = $desc_marca;
    }

    
}

// Criando um objeto da classe Estoque
$marca = new Marca;
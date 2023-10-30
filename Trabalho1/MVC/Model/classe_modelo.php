<?php 

class Modelo {
    // Atributos
    private int $id_modelo;
    private string $desc_modelo;
    private int $id_marca;
    private int $id_linha;

    // Construtor
    public function __construct() {
        $this->id_modelo = 0;
        $this->desc_modelo = "";
        $this->id_marca = 0;
        $this->id_linha = 0;
        echo "Criei um objeto da classe " . __CLASS__;
    }

    // Métodos Get e Set
    public function getIdModelo(): int {
        return $this->id_modelo;
    }

    public function setIdModelo(int $id_modelo): void {
        $this->id_modelo = $id_modelo;
    }

    public function getDescModelo(): int {
        return $this->desc_modelo;
    }

    public function setDescModelo(string $desc_modelo): void {
        $this->desc_modelo = $desc_modelo;
    }

    public function getIdMarca(): int {
        return $this->id_marca;
    }

    public function setIdMarca(int $id_marca): void {
        $this->id_marca = $id_marca;
    }

    public function getIdLinha(): int {
        return $this->id_linha;
    }

    public function setIdLinha(int $id_linha): void {
        $this->id_linha = $id_linha;
    }
}

// Criando um objeto da classe Modelo
$modelo = new Modelo();
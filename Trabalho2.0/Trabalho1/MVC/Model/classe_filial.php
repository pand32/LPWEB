<?php

class Filial {
    // Atributos
    private int $id_filial;
    private string $nome_filial;
    

    // Construtor
    public function __construct() {
        $this->id_filial = 0;
        $this->nome_filial = "";
        
        echo "Criei um objeto da classe Filial " . __CLASS__;
    }

    // Métodos Get e Set
    public function getIdFilial(): int {
        return $this->id_filial;
    }

    public function setIdFilial(int $id_filial): void {
        $this->id_filial = $id_filial;
    }

    public function getNome_Filial(): string {
        return $this->nome_filial;
    }

    public function setNome_Filial(string $nome_filial): void {
        $this->nome_filial = $nome_filial;
    }

    
}

// Criando um objeto da classe Estoque
$filial = new Filial;
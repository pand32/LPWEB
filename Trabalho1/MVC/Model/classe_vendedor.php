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
        echo "Criei um objeto da classe " . __CLASS__;
    }

    // Metodos Get e Set
    public function getIdVenda(): int {
        return $this->id_vendedor;
    }

    public function setIdVenda(int $id_vendedor): void {
        $this->id_vendedor = $id_vendedor;
    }
    
    public function getNomeVendedor(): string {
        return $this->nome_vendedor;
    }

    public function setNomeVendedor(string $nome_vendedor): void {
        $this->nome_vendedor = $nome_vendedor;
    }

    public function getDataAdmissao(): string {
        return $this->data_admissao;
    }

    public function setDataAdmissao(string $data_admissao) {
        $this->data_admissao = $data_admissao;
    }

    public function getDataDemissao(): string {
        return $this->data_demissao;
    }

    public function setDataDemissao(string $data_demissao): void {
        $this->data_demissao = $data_demissao;
    }

    public function getComissao(): int {
        return $this->comissao;
    }

    public function setComissao(float $comissao): void {
        $this->comissao = $comissao;
    }
}

// Criando um objeto da classe Vendedor
$vendedor = new Vendedor;
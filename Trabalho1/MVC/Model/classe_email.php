<?php

class Email {
    // Atributos
    private int $id_email;
    private int $id_cliente;
    private string $email;
    private string $tipo;

    // Construtor
    public function __construct() {
        $this->id_email = 0;
        $this->id_cliente = 0;
        $this->email = "";
        $this->tipo = "";
        echo "Criei um objeto da classe " . __CLASS__;
    }

    // Métodos Get e Set
    public function getIdEmail(): int {
        return $this->id_email;
    }

    public function setIdEmail(int $id_email): void {
        $this->id_email = $id_email;
    }

    public function getIdCliente(): int {
        return $this->id_cliente;
    }

    public function setIdCliente(int $id_cliente): void {
        $this->id_cliente = $id_cliente;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getTipo(): string {
        return $this->tipo;
    }

    public function setTipo(string $tipo): void {
        $this->tipo = $tipo;
    }
}

// Criando um objeto da classe Email
$email1 = new Email;
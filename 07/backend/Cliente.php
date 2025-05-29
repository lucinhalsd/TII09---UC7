<?php

class Cliente
{
    // Tive dificuldade nessa interrogação
    private ?int $id;
    private string $nome;
    private string $cpf;  // Adicionei o cpf como opcional
    private bool $ativo;
    private string $dataDeNascimento;
   
    public function __construct(?int $id, string $nome, string $cpf, bool $ativo, string $dataDeNascimento)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->ativo = $ativo;
        $this->dataDeNascimento = $dataDeNascimento;
    }
       
      // Getters
    public function getId(): ?int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function getCpf(): string { return $this->cpf; }
    public function getAtivo(): bool { return $this->ativo; }
    public function getDataDeNascimento(): string { return $this->dataDeNascimento; }
    
    // Setters
    public function setNome(string $nome): void { $this->nome = $nome; }
    public function setCpf(string $cpf): void { $this-> cpf = $cpf ;}
    public function setDataDeNascimento(string $dataDeNascimento):void  { $this->dataDeNascimento = $dataDeNascimento; }
    public function setAtivo(bool $ativo):void  { $this->ativo = $ativo; }
}
<?php

class contato
{
    private ?int $id;
    private string $nome;

    public function __construct(?int $id, string $nome)
    {
        $this->id = $id;
        $this->nome = $nome;
    } 

     // Buscar Valores
     public function getId(): ?int { return $this->id;}
    public function getNome(): string { return $this->nome;}


    // Inserir Valores
    public function setNome(string $novoNome)
    {
        $this->nome = $novoNome;
    }
    
    
}
 $cont1 = new Contato(1, "fulano");

 print_r($cont1);
<?php

/*
Propriedades: nome, veiculo, telefone (todos private string)
Construtor que recebe todas as propriedades
Sobrescreva __tostring() para visualizarmos os dados
Crie um get para o "nome" e um set para o "telefone"
*/

class Cliente {
   private string $nome;
   private string $veiculo;
   private string $telefone;


 public function __construct(string $nome, string $veiculo, string $telefone){
    $this->nome = $nome;
    $this->veiculo = $veiculo;
    $this->telefone = $telefone;
}

 public function getNome( string $nome){
    return $this->nome;
  }

  public function setTelefone(string $novoNumero): void {
    if(strlen($novoNumero) == 11) {
        $this->telefone = $novoNumero;
    } else {
        echo "Telefone inválido <br>";
    }
    
}

 public function __toString(){

    return " $this->nome, $this->veiculo, $this->telefone <br>";
}
  }

  $cliente = new Cliente("luci", "Tcross", "11977947334");
  print_r($cliente);

  $cliente->setTelefone("11955778899");
echo($cliente);

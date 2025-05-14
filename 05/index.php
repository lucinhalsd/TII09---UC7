<?php

class Produto{
   private string $nome;
   private float $preco;

   public function __construct(string $nome, float $preco){
    $this->nome = $nome;
    $this->preco = $preco;
   }

   public function getNome(){
     return $this->nome;
   }

   public function getPreco(): string {
    return $this->preco;
   }

   public function setNome(string $nome) {
    if(strlen($nome) > 2) {
        $this->nome = $nome;
    } else {
        throw(new Error("Invalid Name"));
    }
}

public function __toString()
{
    return "Nome: $this->nome, Preço: $this->preco <br>";
}
}

$p1 = new Produto('Abobora', 5.2);
print_r($p1);

echo "<br>";
echo ($p1->getNome());
echo "<br>";
echo ($p1->setNome("Abobora"));
echo "<br>";
echo ($p1->getNome() . "-" . $p1->getPreco());
echo"<br>";
echo($p1);

# Prodcedural
/*
$nome = 'Abobora';
$preco = 5.2;

$produtos[] = ['nome' => $nome, 'preco' => $preco];

$nome2 = 'Batata';
$preco = 6.0

$produtos[] = ['nome' => $nome2, 'preco' => $preco2];

$nome3 = 'Cebola';
$preco = 4.5;
$peso = 2; 

$produtos[] = ['nome' => $nome3, 'preco' => $preco3, 'peso' => $peso3];

echo "<pre>";
print_r($produtos);
echo "</pre>";
*/

<?php

// Declaração de variaveis:
$suaVariavel;

// Atribuição de valor:
$nome = "Lucimara"; // string
$idade = 25; // int

// Exibição e concatenação de valores:
echo "Nome:"  . $nome . "<br>";
echo "Idade: " . $idade .  "anos <br>";

// Uso de aspas
echo "Esse é um texto em aspas duplas <br>";
echo 'Esse é um texto em aspas simples <br>';

echo "Nome: $nome <br>"; // Interpolação de variável
echo 'Idade: $idade anos <br>'; // não faz interpolação pq precisa das " duplas

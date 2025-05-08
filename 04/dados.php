<?php

$produtos = [
    ["nome" => "Pão", "preco" => 1.50],
    ["nome" => "Café", "preco" => 3.00],
    ["nome" => "Leite", "preco" => 4.80]
];
 
function calcularTotalProdutos(array $itens): float
{
    $total = 0;

    foreach ($itens as $item) {
        $total += $item['preco'];
    }

    return $total;
}

echo "Total: R$ " . number_format(calcularTotalProdutos($produtos),2,',','.');

// $maisBarato = $produtos[0]; (PRIMEIRA SOLUÇAO DO AECIO)

// if($produtos[1]['preco'] < $produtos[0]['preco']) {
//     $maisBarato = $produtos[1];
// }

// echo $maisBarato['nome'];


//SEGUNDA SOLUÇÃO COM DETALHE DO AECIO
function produtoMaisBarato(array $itens): array {
    $maisBarato = $itens[0];
    
    foreach($itens as $item) {
        if($item['preco'] < $maisBarato['preco']) {
            $maisBarato = $item;
        }
    }

    return $maisBarato;
}

$resultado = produtoMaisBarato($produtos);
echo "O item mais barato da lista é {$resultado['nome']} 
        no preço de {$resultado['preco']}";


// TERCEIRA SOLUÇÃO DADO PELA IA
function encontrarProdutoMaisBarato($produtos) {
    $menorPreco = $produtos[0]["preco"];
    $produtoMaisBarato = $produtos[0];
    
    foreach ($produtos as $produto) {
      if ($produto["preco"] < $menorPreco) {
      $menorPreco = $produto["preco"];
      $produtoMaisBarato = $produto;
    }
    }
    
    return $produtoMaisBarato;
    }
    
    $produtoMaisBarato = encontrarProdutoMaisBarato($produtos);
    echo "O produto mais barato é: " . $produtoMaisBarato["nome"] . " com o preço de R$ " . number_format($produtoMaisBarato["preco"], 2, ',', '.') . "\n";
    ?>
    
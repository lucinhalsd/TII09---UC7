<?php

/*
Crie um array multidimensional com 2 clientes, cada um contendo:
- nome
- cpf
- cidade
*/
?>

<table border = 2>
<?php
$clientes [
    [
    "nome" => "Luci",
    "cpf" => "12345678900",
    "cidade" => "Sao Paulo",
   ],

    [
        "nome" => "Carlos",
        "cpf" => "98765432101",
        "cidade" => "Cajamar",
    ],
],

    foreach($clientes as $c) {
        echo "<tr><td>{$c['nome']}</td><td>{$c['cpf']}</td><td>{$c['cidade']}</td></tr>";
    }
?>
</table>


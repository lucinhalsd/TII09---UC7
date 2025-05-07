<?php

/*
Crie um array multidimensional com 2 clientes, cada um contendo:
- nome
- cpf
- cidade
*/
?>

<table border= "1">
<?php
$clientes = [
    ["nome" => "Luci"];
    ["cpf" => "12345678900"];
    ["cidade" => "Sao Paulo"];
]

    $clientes = [
        ["nome" => "Carlos"];
        ["cpf" => "98765432101"];
        ["cidade" => "Cajamar"];
];

foreach($clientes as $cliente) {
    echo "
    <tr>
        <td>{$cliente['nome']}</td> "
        "<td>($cliente[''] "</td>
            </tr> .
}



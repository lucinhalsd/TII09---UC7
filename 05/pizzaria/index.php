<?php

require_once 'Conexao.php';
require_once 'PizzaDAO.php';

$dao= new Conexao();
$bd = new PizzaDAO();


$pizza = null

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pizzas</title>    
</head>
<body>
    <h2>Lista de Pizzas</h2>

    <table border="1" cellpading="5">
        <tr><th>ID</th><th>SABOR</th><th>TAMANHO</th><th>PREÇO</th></tr>
        <?php foreach($pizzas as $p): ?>
            <tr>
                <td><?= $p->getId()  ?></td>
                <td><?= $p->getSabor() ?></td>
                <td><?= $p->getTamanho() ?></td>
                <td><?= $p->getPreco() ?></td>
                <td><a href="alterar_pizza.php">Alterar</a></td>
                <td><a href="excluir_pizza.php">Excluir</a></td> 
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="pizza_form.php">Cadastrar Nova</a>
</body>
</html>
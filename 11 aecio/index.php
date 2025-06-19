<?php
session_start();

$isLogged = isset($_SESSION['token']);
?>

<h1>Bem-vindo</h1>

<nav>
    <a href="index.php">Home</a>
    <a href="./produtos/listar.php">Produtos</a>
    <?php if ($isLogged): ?>
        <a href="./produtos/criar.php">Novo Produto</a>
        <a href="logout.php">Sair</a>
    <?php else: ?>
        <a href="login.php">Login</a>
        <a href="cadastro.php">Cadastrar</a>
    <?php endif; ?>
</nav>
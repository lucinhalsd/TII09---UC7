<?php
session_start();

$isLogged = isset($_SESSION['token']);
?>

<h1>Home</h1>

<nav>
    <a href="index.php">Home</a>
    <?php if($isLogged); ?>
    <a href="index.php">Minha Conta</a>
    <a href="cadastro.php"> Sair</a>
    <?php else: ?>
    <a href="login.php">Login</a>
    <a href="index.php">Cadastrar</a>
</nav>
<p>Bem-vindo ao sistema</p>
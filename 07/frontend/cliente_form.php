<?php

require_once '../backend/ClienteDAO.php';
$dao = new ClienteDAO();


if (isset($_GET['id'])) {
    $cliente = $dao->getById($_GET['id']);
}

if ($_POST) {

    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'];
    $ativo = $_POST['ativo'] ? true : false;
    $dataDeNascimento = $_POST['dataDeNascimento'];
    
    $cliente= new Cliente($id, $nome, $ativo, $dataDeNascimento);

    if ($id) {
        $dao->update($cliente);
    } else {
        $dao->create($cliente);
    }

    header("Location: ../index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Formulario de Produto</title> -->
    <title><?= $produto ? 'Edição de Cliente' : 'Cadastro de Cliente' ?></title>
    
</head>

<body>
    <h2><?= $cliente ? 'Editar Cliente' : 'Cadastrar Cliente' ?></h2>

    <form action="cliente_form.php" method="post">
        <?php if ($cliente): ?>
            <input hidden name="id" required value="<?= $clienteDAO->getId() ?>">
        <?php endif; ?>

        <label>Nome:</label>
        <input type="text" name="nome" required value="<?= $cliente ? $clienteDAO->getNome() : '' ?>"><br>

        <label>Ativo:</label>
        <input type="checkbox" name="ativo" value="1" <?= $cliente && $clienteDAO->getAtivo() ? 'checked' : '' ?>><br>

        <label>Data de Nascimento:</label>
        <input type="date" name="dataDeNascimento" required value="<?= $cliente ? $clienteDAO->getDataDeNascimento() : '' ?>"><br>

        
        <button type="submit">Salvar</button>
    </form>

    <a href="../index.php">Cancelar</a>
</body>

</html>
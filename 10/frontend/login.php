<?php
session_start();
require_once '../UsuarioDAO.php';

if(isset($_SESSION['token']))
{
    header('Location: index.php');
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $SENHA = filter_input(INPUT_POST, 'senha');

    $dao = new UsuarioDAO();
    $Usuario = $dao->getByEmail($email);

    if($Usuario && password_verify($senha, $Usuario->getSenha()))
    {
       $token = bin2hex(random_bytes(25));
       $_SESSION['token'] = $token; // Armazenar o token na seção
       $dao->updateToken($usuario->getId(), $tpken);
       header('Location: index.php'); // Redirecionar para a paqgina inicial
       exit();
    }
    else
    {
        $erro = "Email ou senha invalidos!";
    }
}

?>

<h1>Login</h1>
<?php if(isset($erro)) echo "<p style = 'color:red'>$erro</p>"; ?>

<form method="POST">
    Email: <input type="email" name="email" require ><br>
    Senha:  <input type="passwoard" nome ="senha" require ><br>
    <button type = "submit">Entrar</button>
</form>
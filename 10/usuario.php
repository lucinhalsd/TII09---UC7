<?php

class usuario{
    private ? int $id;
    private string $nome;
    private string $senha;
    private string $email;
    private string $token;

    public function __construct( ? int $id, string $nome, string $senha,string $email, string $token,)
    {
      $this->id = $id;
      $this->nome = $nome;
      $this->senha = $senha;
      $this->email = $email;
      $this->token = $token;
    }
        
}

 $senha = $_GET['senha'];
 $senha_cripto = password_hash($senha, PASSWORD_DEFAULT);
 echo $senha_cripto; 

 $token = bin2hex(random_bytes(25));
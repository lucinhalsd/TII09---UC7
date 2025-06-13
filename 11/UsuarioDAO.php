<?php

require_once 'Usuario.php';
require_once 'Database.php';

class UsuarioDAO
{
    private $db;

    public function __construct()
    {
       $this->db = Database :: getInstance() ;
    }
    
    public function create(Usuario $usuario)
    {
        $sql = "INSERT INTO usuario(nome, senha, email, token) VALUES (:nome, :nome, :email, :token)";
        $stmt = $this->db->prepare($sql);
        return $sql->execute(
        [
            ':nome' => $usuario->getNome(),
            ':senha' => $usuario->getSenha(),
            ':email' => $usuario->getEmail(),
            ':token' => $usuario->getToken(),
        ]);
    }
        public function getEmail(string $email): ? Usuario
        {
            $stmt = $this->db->prepare("SELECT * FROM usuario WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $data = $stmt->fetch();

        return $data ?
            new Usuario($data['id'], $data['nome'], $data['senha'], $data['email'], $data['token'])
            : null;
        }
          
        public function getToken(INT $token): ? usuario
        {
        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE token = :token");
        $stmt->execute([':token' => $token]);
        $data = $stmt->fetch();

        return $data ?
            new Usuario($data['id'], $data['nome'], $data['senha'], $data['email'], $data['token'])
            : null;
        }

         public function updateToken(int $id, ? string $token): bool
         {
            $stmt = $this->db->prepare("UPDATE usuario SET token = :token WHERE id = :id");
            return $stmt->execute([
                ':token' => $token,
                ':id' => $id
            ])
         }
         
        }

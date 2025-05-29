<?php

require_once 'Cliente.php';
require_once 'Database.php';

class ClienteDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM clientes");
        $cliente = [];

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cliente[] =  new Cliente(
                $row['id'],
                $row['nome'],
                $row['cpf'],
                $row['ativo'],
                $row['dataDeNascimento'],
                
            );
        }

        return $cliente;
    }

   // public function getAllAlternativo(): array
    {
        $reulstado = $this->db->query("SELECT * FROM clientes")->fetchAll();
        $clientes = [];

        foreach($reulstado as $res)
        {
            $clientes[] = new Cliente($res['id'], $res['nome'], $res['cpf'], $res['dataDeNascimento'], $res['ativo']);
        }

        return  $clientes;
    }
}

$dao =  new ClienteDAO();




   
public function getById(int $id): ?Cliente
    {
        $sql = "SELECT * FROM cliente  WHERE id = :id";

        $stmt = $this->db->prepare("SELECT * FROM cliente  WHERE id = :id";
);        
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row? new Cliente(     //Tive dificuldade nesse return
            $row['id'],
            $row['nome'],
            $row['ativo'],
            $row['dataDeNascimento'],
           
        ) : null;  //retorna null se não encontrar o cliente
    }

     public function delete(int $id): void
    {
        $stmt = $this->db->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }


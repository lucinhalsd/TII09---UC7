<?php

require_once "Database.php";
require_once 'Contato.php';

class contatoDAO
{
    private $db; // usado em todas as funçoes

    public function __construct()
    {
       $this->db = Database::getInstance(); 
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM contatos");
        $contatos = []; // inicializa um array vazio

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $contatos[] = new Contato($row['id'], $row['nome']);
        }

        return $contatos;
    }
    public function create(Contato $contatos)
    {
        $sql = "INSERT INTO contatos (nome) VALUES (:nome)";
        $stmt = $this->db->prepare($sql);

        $nome = $contatos->getNome();

        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
    }   
 }

 $cont1 = new Contato(null, "Superman");
 $dao = new contatoDAO();

 $dao->create($cont1);


<?php

require_once '../Database.php';
require_once '../model/Produto.php';

class ProdutoDAO
{
    private PDO $db;

    public function __construct()
    {
       $this->db = Database:: getInstance();

    }

    public function getALL(): array
    {
        $stmt = $this->db->query("SELECT * FROM produtos");
        $produtosData = $stmt->fetchall();
        $produtos =[];

        foreach($produtosData as $data);
        {
            $produtos[] = new Produto 
            ($data['id'],
             $data['nome'], 
             $data['preco'],
             $data['ativo'],
             $data['dataDeCadastro'],
            $data['dataDeValidade']);
        }

        return $produtos;
    }

    public function getByeID( int $id): ?Produto
    {
        $stmt = $this->db->prepare("SELEC * FROM produtos WHERE id = :id");
        $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch();

        if($data){
            return new Produto(
                $data['id'],
                $data['nome'],
                $data['preco'],
                $data['ativo'],
                $data['dataDeCadastro'],
                $data['dataDeValidade']
            );
         }

         return null;
    }

    public function Create(Produto $produto): bool
    {
        $sql = "INSERT INTO produtos (nome, preco, ativo, dataDeCadastro, dataDeVencimento)
                VALUES (:nome, :preco, :ativo, :dataDeCadastro, :dataDeValidade)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
           ':id' => $produto->getId(),
            ':nome' => $produto->getNome(),            
            ':preco' => $produto->getPreco(),            
            ':ativo' => $produto->getAtivo(),            
            ':cadastro' => $produto->getDataDeCadastro(),            
            ':validade' => $produto->getDataDeValidade()
        ]);
    }    

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare("DELETE FROM produtos WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
    
// Compare this snippet from 07%20-%201/backend/ProdutoDAO.php;
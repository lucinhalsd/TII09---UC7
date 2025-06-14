<?php

// Para funcionar com o frontend
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}
// (Acima) Para funcionar com o frontend

require_once __DIR__ . '/../dao/ProdutoDAO.php';


$dao = new ProdutoDAO();
$action = $_GET['action'] ?? null;
$id = isset($_GET['id']) ? $_GET['id'] : null;
$inputBody = json_decode(file_get_contents('php://input'), true);

switch ($action) {
    case 'Editar' : // GET


        if($_SERVER['REQUEST_METHOD'] == 'POST' && $inputBody) {
            $prd = new Produto(null,
            $inputBody['nome'], 
            $inputBody['preco'],
            $inputBody['ativo'], 
            $inputBody['dataDeValidade'],
            $inputBody['dataDeCadastro']);
        }

        
        if($dao->create($prd)) {
            http_response_code(201);
            echo json_encode(['success' => 'Produto cadastrado com sucesso!']);
        } else
        {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao cadastrar o produto!']);
        }
         break;
    }    



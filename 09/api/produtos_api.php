<?php

 // para funcionaqr com o frontend

header('Content-type: application/json');
header('Access-Control-allow-origin: *');
header('Access-Control-Allow-Methods: GET, POST,PUT, DELETE,OPTIONS');
header ('Access-Control-Allow-Headers: Content-Type');

if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
    exit;
}
 // para funcionar com o frontend

require_once __DIR__ . '/../dao/ProdutoDAO.php';

$dao = new ProdutoDAO();

$action = $_GET['action'] ?? null;
$id = isset($_GET['id']) ? $_GET['id'] : null;
$inputBody = json_decode(file_get_contents('php://input'), true);

switch ($action) {
    case 'listar' : // GET
        echo json_encode($dao-> getALL());
        break;

    case 'buscar';   // GET
        if($id){
            $produto = $dao->getByeID($id);
            if($produto){
                echo json_encode($produto);
            }else{
                http_response_code(404);
                echo json_encode(['error' => 'Produto não encontrado!']);
            }
        }else{
            http_response_code(400);
            echo json_encode(['error' => 'Você não informou o ID']);
        }
        break;
    
        case 'cadastrar': // POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $inputBody) {
                $produto = new Produto(null, $inputBody['nome'], $inputBody['preco'], $inputBody['ativo'], $inputBody['dataDeCadastro'], $inputBody['dataDeValidade']);
                
                if($dao->create($produto))
                // if($dao->create_function_inseguro($produto)) // SQL Injection
                {
                    http_response_code(201);
                    echo json_encode(['success' => 'Produto cadastrado']);
                }
                else 
                {
                    http_response_code(500);
                    echo json_encode(['error' => 'Produto não cadastrado!']);
                }
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Método incorreto']);
            }
            break;

        case 'atualizar':  // PUT
            if ($_SERVER['REQUEST_METHOD'] == 'PUT' && $inputBody && $id) {
                $produto = new ProdutoDAO(
                    $is,
                    $inputBody['nome'],
                    $inputBody['preco'],
                    $inputBody['ativo'],
                    $inputBody['dataDeCadastro'],
                    $inputBody['daraDeValidade']

                );
            }
    
            if($dao->update($produto))
            {
                http_response_code(204);
                echo json_encode(['success' => 'Produto atualizado']);
                
            }
            

}
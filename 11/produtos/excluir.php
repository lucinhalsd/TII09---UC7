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

switch($action) {
    case 'Excluir' :  //DELETE
        if ($id && $_SERVER['REQUEST_METHOD'] == 'DELETE') {
            if ($dao->delete($id)) {
                echo json_encode(['message' => 'Produto excluído!']);
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'Erro ao excluir!']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'ID não fornecido ou método incorreto']);
        }
        break;
     
        default:
        http_response_code(400);
        echo json_encode(['error' => 'Acao invalida']);
        break;
}
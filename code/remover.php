<?php
require_once('classes/login.php');
require_once('classes/DB.php');

$validador = new Login();
$validador->verificar_logado();

$db = new DB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);

    // Verifica se o ID existe no banco antes de excluir
    $produto = $db->buscarProdutoPorId($id);

    if ($produto) {
        $db->deleteProduto($id);
        $mensagem = "Produto com ID $id excluído com sucesso.";
    } else {
        $mensagem = "Erro: Nenhum produto encontrado com o ID $id.";
    }
} else {
    $mensagem = "Requisição inválida.";
}

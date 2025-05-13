<?php
require_once('classes/login.php');
require_once('classes/DB.php');

$validador = new Login();
$validador->verificar_logado();

$db = new DB();
$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $produto = $db->buscarProdutoPorId($id);

    if ($produto) {
        $db->deleteProduto($id);
        $mensagem = "Produto com ID $id excluído com sucesso.";
    } else {
        $mensagem = "Produto com ID $id não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #6c63ff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        main {
            padding: 40px;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            display: inline-block;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        input[type="number"] {
            padding: 10px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #d9534f;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background-color: #c9302c;
        }

        .mensagem {
            margin-top: 20px;
            font-weight: bold;
            color: #444;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            color: #6c63ff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>Excluir Produto por ID</h1>
    </header>

    <main>
        <?php if (!empty($mensagem)): ?>
            <p class="mensagem"><?= htmlspecialchars($mensagem) ?></p>
        <?php endif; ?>

        <form method="POST">
            <label for="id">Digite o ID do produto:</label><br>
            <input type="number" name="id" id="id" required><br>
            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este produto?');">Excluir Produto</button>
        </form>

    </main>
    
    <div style="text-align: center; margin-top: 20px;">
        <a href="home.php">Voltar</a>
    </div>
</body>
</html>

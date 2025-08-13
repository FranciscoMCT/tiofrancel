<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $marca = $_POST['marca'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $imagem = $_POST['imagem'];

    $sql = "INSERT INTO Celulares (Nome, Marca, Preco, Descricao, ImagemURL)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome, $marca, $preco, $descricao, $imagem]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Celular</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>📦 Cadastrar Novo Celular</h1>
    <form method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Marca:</label><br>
        <input type="text" name="marca" required><br><br>

        <label>Preço:</label><br>
        <input type="number" step="0.01" name="preco" required><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao"></textarea><br><br>

        <label>URL da Imagem:</label><br>
        <input type="text" name="imagem"><br><br>

        <button type="submit">Cadastrar</button>
    </form>
    <br>
    <a href="index.php">← Voltar</a>
</body>
</html>

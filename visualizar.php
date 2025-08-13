<?php
require 'db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID inválido.";
    exit;
}

$stmt = $conn->prepare("SELECT * FROM Celulares WHERE Id = ?");
$stmt->execute([$id]);
$celular = $stmt->fetch();

if (!$celular) {
    echo "Celular não encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Celular</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>🔍 Detalhes do Celular</h1>
    <h2><?= $celular['Nome'] ?></h2>
    <p><strong>Marca:</strong> <?= $celular['Marca'] ?></p>
    <p><strong>Preço:</strong> R$ <?= $celular['Preco'] ?></p>
    <p><strong>Descrição:</strong> <?= $celular['Descricao'] ?></p>
    <?php if ($celular['ImagemURL']): ?>
        <img src="<?= $celular['ImagemURL'] ?>" alt="Imagem do celular" width="300">
    <?php endif; ?>
    <br><br>
    <a href="index.php">← Voltar</a>
</body>
</html>

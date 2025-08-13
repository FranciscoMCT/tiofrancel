<?php
require 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Loja de Celulares</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>📱 Loja de Celulares</h1>
    <a href="cadastro.php">Cadastrar novo celular</a>
    <hr>

    <?php
    $stmt = $conn->query("SELECT * FROM Celulares");
    $celulares = $stmt->fetchAll();

    foreach ($celulares as $celular) {
        echo "<div class='card'>";
        echo "<h2>{$celular['Nome']}</h2>";
        echo "<p><strong>Marca:</strong> {$celular['Marca']}</p>";
        echo "<p><strong>Preço:</strong> R$ {$celular['Preco']}</p>";
        echo "<a href='visualizar.php?id={$celular['Id']}'>Ver detalhes</a>";
        echo "</div><hr>";
    }
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produtos</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>

    <div class="container">

        <h1>Escolha de Produto</h1>

        <form method="POST">

            <label>Escolha um produto:</label>

            <select name="produto" required>
                <option value="">Selecione</option>
                <option value="1">Caderno - R$ 20,00</option>
                <option value="2">Caneta - R$ 3,50</option>
                <option value="3">Mochila - R$ 80,00</option>
                <option value="4">Estojo - R$ 25,00</option>
                <option value="5">Lápis - R$ 2,00</option>
            </select>

            <label>Quantidade:</label>
            <input type="number" name="quantidade" min="1" required>
            <button type="submit">Calcular</button>
        </form>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $produto = $_POST["produto"];
            $quantidade = $_POST["quantidade"];

            switch ($produto) {

                case 1:
                    $nome = "Caderno";
                    $preco = 20.00;
                    break;

                case 2:
                    $nome = "Caneta";
                    $preco = 3.50;
                    break;

                case 3:
                    $nome = "Mochila";
                    $preco = 80.00;
                    break;

                case 4:
                    $nome = "Estojo";
                    $preco = 25.00;
                    break;

                case 5:
                    $nome = "Lápis";
                    $preco = 2.00;
                    break;

                default:
                    echo "<div class='resultado'>Produto inválido.</div>";
                    exit;
            }

            $total = $preco * $quantidade;

            echo "<div class='resultado'>";
            echo "Produto: $nome<br>";
            echo "Quantidade: $quantidade<br>";
            echo "Valor total: R$ " . number_format($total, 2, ',', '.');
            echo "</div>";
        }
        ?>

        <a href="index.php" class="voltar">← Voltar</a>
    </div>

</body>
</html>

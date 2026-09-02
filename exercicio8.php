<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lanchonete</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>

    <div class="container">
        <h1>Lanchonete</h1>

        <form method="POST">

            <label>Escolha o produto:</label>

            <select name="produto" required>
                <option value="">Selecione</option>
                <option value="1">Hambúrguer - R$ 15,00</option>
                <option value="2">X-Salada - R$ 18,00</option>
                <option value="3">Batata Frita - R$ 10,00</option>
                <option value="4">Refrigerante - R$ 6,00</option>
                <option value="5">Suco - R$ 7,00</option>
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
                    $nome = "Hambúrguer";
                    $preco = 15.00;
                    break;

                case 2:
                    $nome = "X-Salada";
                    $preco = 18.00;
                    break;

                case 3:
                    $nome = "Batata Frita";
                    $preco = 10.00;
                    break;

                case 4:
                    $nome = "Refrigerante";
                    $preco = 6.00;
                    break;

                case 5:
                    $nome = "Suco";
                    $preco = 7.00;
                    break;

                default:
                    echo "<div class='resultado'>Produto inválido.</div>";
                    exit;
            }

            $total = $preco * $quantidade;

            if ($quantidade <= 2) {

                $desconto = 0;

            } elseif ($quantidade <= 5) {

                $desconto = $total * 0.05;

            } else {

                $desconto = $total * 0.10;
            }

            $valorFinal = $total - $desconto;

            echo "<div class='resultado'>";
            echo "Produto: $nome<br>";
            echo "Quantidade: $quantidade<br>";
            echo "Valor da compra: R$ " . number_format($total, 2, ',', '.') . "<br>";
            echo "Desconto: R$ " . number_format($desconto, 2, ',', '.') . "<br>";
            echo "Valor final: R$ " . number_format($valorFinal, 2, ',', '.');
            echo "</div>";
        }
        ?>

        <a href="index.php" class="voltar">← Voltar</a>
    </div>

</body>
</html>

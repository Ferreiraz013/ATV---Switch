<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Loja</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>

    <div class="container">
        <h1>Sistema de Loja</h1>
        <form method="POST">

            <label>Escolha uma opção:</label>

            <select name="opcao" required>
                <option value="">Selecione</option>
                <option value="1">Escolher produto</option>
                <option value="2">Informar quantidade</option>
                <option value="3">Calcular compra</option>
                <option value="4">Aplicar desconto</option>
                <option value="5">Consultar total</option>
                <option value="6">Finalizar compra</option>
            </select>

            <label>Produto:</label>

            <select name="produto">
                <option value="1">Camiseta - R$ 50,00</option>
                <option value="2">Calça - R$ 100,00</option>
                <option value="3">Tênis - R$ 250,00</option>
                <option value="4">Mochila - R$ 150,00</option>
                <option value="5">Boné - R$ 40,00</option>
            </select>

            <label>Quantidade:</label>
            <input type="number" name="quantidade" min="1" value="1">
            <button type="submit">Confirmar</button>
        </form>

        <?php

        session_start();

        if (!isset($_SESSION["produtoLoja"])) {
            $_SESSION["produtoLoja"] = "";
            $_SESSION["precoLoja"] = 0;
            $_SESSION["quantidadeLoja"] = 0;
            $_SESSION["totalLoja"] = 0;
            $_SESSION["descontoLoja"] = 0;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $opcao = $_POST["opcao"];
            $produto = $_POST["produto"];
            $quantidade = $_POST["quantidade"];

            switch ($opcao) {

                case 1:

                    switch ($produto) {

                        case 1:
                            $_SESSION["produtoLoja"] = "Camiseta";
                            $_SESSION["precoLoja"] = 50.00;
                            break;

                        case 2:
                            $_SESSION["produtoLoja"] = "Calça";
                            $_SESSION["precoLoja"] = 100.00;
                            break;

                        case 3:
                            $_SESSION["produtoLoja"] = "Tênis";
                            $_SESSION["precoLoja"] = 250.00;
                            break;

                        case 4:
                            $_SESSION["produtoLoja"] = "Mochila";
                            $_SESSION["precoLoja"] = 150.00;
                            break;

                        case 5:
                            $_SESSION["produtoLoja"] = "Boné";
                            $_SESSION["precoLoja"] = 40.00;
                            break;
                    }

                    echo "<div class='resultado'>";
                    echo "Produto escolhido: " . $_SESSION["produtoLoja"];
                    echo "</div>";

                    break;

                case 2:

                    if ($quantidade <= 0) {

                        echo "<div class='resultado'>Quantidade inválida.</div>";

                    } else {

                        $_SESSION["quantidadeLoja"] = $quantidade;

                        echo "<div class='resultado'>";
                        echo "Quantidade: $quantidade";
                        echo "</div>";
                    }

                    break;

                case 3:

                    $_SESSION["totalLoja"] =
                        $_SESSION["precoLoja"] * $_SESSION["quantidadeLoja"];

                    echo "<div class='resultado'>";
                    echo "Valor da compra: R$ " .
                        number_format($_SESSION["totalLoja"], 2, ',', '.');
                    echo "</div>";

                    break;

                case 4:

                    $total = $_SESSION["totalLoja"];

                    if ($total < 100) {

                        $_SESSION["descontoLoja"] = 0;

                    } elseif ($total < 300) {

                        $_SESSION["descontoLoja"] = $total * 0.05;

                    } elseif ($total < 500) {

                        $_SESSION["descontoLoja"] = $total * 0.10;

                    } else {

                        $_SESSION["descontoLoja"] = $total * 0.15;
                    }

                    echo "<div class='resultado'>";
                    echo "Desconto aplicado: R$ " .
                        number_format($_SESSION["descontoLoja"], 2, ',', '.');
                    echo "</div>";

                    break;

                case 5:

                    $valorFinal =
                        $_SESSION["totalLoja"] - $_SESSION["descontoLoja"];

                    echo "<div class='resultado'>";
                    echo "Total: R$ " .
                        number_format($valorFinal, 2, ',', '.');
                    echo "</div>";

                    break;

                case 6:

                    $valorFinal =
                        $_SESSION["totalLoja"] - $_SESSION["descontoLoja"];

                    echo "<div class='resultado'>";

                    echo "Produto: " . $_SESSION["produtoLoja"] . "<br>";

                    echo "Quantidade: " .
                        $_SESSION["quantidadeLoja"] . "<br>";

                    echo "Valor original: R$ " .
                        number_format($_SESSION["totalLoja"], 2, ',', '.') .
                        "<br>";

                    echo "Desconto: R$ " .
                        number_format($_SESSION["descontoLoja"], 2, ',', '.') .
                        "<br>";

                    echo "Valor final: R$ " .
                        number_format($valorFinal, 2, ',', '.');

                    echo "</div>";

                    break;

                default:

                    echo "<div class='resultado'>Opção inválida.</div>";
            }
        }
        ?>

        <a href="index.php" class="voltar">← Voltar</a>
    </div>

</body>
</html>

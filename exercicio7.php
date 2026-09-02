<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Caixa Eletrônico</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>

    <div class="container">
        <h1>Caixa Eletrônico</h1>
        <p>Saldo inicial: R$ 1.500,00</p>

        <form method="POST">

            <label>Escolha uma opção:</label>
            <select name="opcao" required>
                <option value="">Selecione</option>
                <option value="1">Consultar saldo</option>
                <option value="2">Depositar</option>
                <option value="3">Sacar</option>
                <option value="4">Sair</option>
            </select>

            <label>Valor:</label>
            <input type="number" name="valor" step="0.01">
            <button type="submit">Confirmar</button>
        </form>

        <?php

        session_start();

        if (!isset($_SESSION["saldo"])) {
            $_SESSION["saldo"] = 1500.00;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $opcao = $_POST["opcao"];
            $valor = $_POST["valor"];

            switch ($opcao) {

                case 1:

                    echo "<div class='resultado'>";
                    echo "Saldo atual: R$ " . number_format($_SESSION["saldo"], 2, ',', '.');
                    echo "</div>";

                    break;

                case 2:

                    if ($valor <= 0) {

                        echo "<div class='resultado'>O valor do depósito deve ser maior que zero.</div>";

                    } else {

                        $_SESSION["saldo"] += $valor;

                        echo "<div class='resultado'>";
                        echo "Depósito realizado!<br>";
                        echo "Saldo atual: R$ " . number_format($_SESSION["saldo"], 2, ',', '.');
                        echo "</div>";
                    }

                    break;

                case 3:

                    if ($valor <= 0) {

                        echo "<div class='resultado'>O valor do saque deve ser maior que zero.</div>";

                    } elseif ($valor > $_SESSION["saldo"]) {

                        echo "<div class='resultado'>Saldo insuficiente.</div>";

                    } else {

                        $_SESSION["saldo"] -= $valor;

                        echo "<div class='resultado'>";
                        echo "Saque realizado!<br>";
                        echo "Saldo atual: R$ " . number_format($_SESSION["saldo"], 2, ',', '.');
                        echo "</div>";
                    }

                    break;

                case 4:

                    session_destroy();

                    echo "<div class='resultado'>Caixa eletrônico encerrado.</div>";

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
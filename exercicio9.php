<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Bancário</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>

    <div class="container">

        <h1>Sistema Bancário</h1>
        <p>Saldo inicial: R$ 2.000,00</p>
        <p>Limite disponível: R$ 500,00</p>

        <form method="POST">

            <label>Escolha uma opção:</label>

            <select name="opcao" required>
                <option value="">Selecione</option>
                <option value="1">Consultar saldo</option>
                <option value="2">Depositar</option>
                <option value="3">Sacar</option>
                <option value="4">Consultar limite</option>
                <option value="5">Pagar conta</option>
                <option value="6">Sair</option>
            </select>

            <label>Valor:</label>
            <input type="number" name="valor" step="0.01">
            <button type="submit">Confirmar</button>
        </form>

        <?php

        session_start();

        if (!isset($_SESSION["saldoBanco"])) {
            $_SESSION["saldoBanco"] = 2000.00;
        }

        $limite = 500.00;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $opcao = $_POST["opcao"];
            $valor = $_POST["valor"];

            switch ($opcao) {

                case 1:

                    echo "<div class='resultado'>";
                    echo "Saldo atual: R$ " . number_format($_SESSION["saldoBanco"], 2, ',', '.');
                    echo "</div>";

                    break;

                case 2:

                    if ($valor <= 0) {

                        echo "<div class='resultado'>O valor do depósito deve ser maior que zero.</div>";

                    } else {

                        $_SESSION["saldoBanco"] += $valor;

                        echo "<div class='resultado'>";
                        echo "Depósito realizado!<br>";
                        echo "Saldo: R$ " . number_format($_SESSION["saldoBanco"], 2, ',', '.');
                        echo "</div>";
                    }

                    break;

                case 3:

                    if ($valor <= 0) {

                        echo "<div class='resultado'>O valor do saque deve ser maior que zero.</div>";

                    } elseif ($valor > $_SESSION["saldoBanco"]) {

                        echo "<div class='resultado'>Saldo insuficiente para realizar o saque.</div>";

                    } else {

                        $_SESSION["saldoBanco"] -= $valor;

                        echo "<div class='resultado'>";
                        echo "Saque realizado!<br>";
                        echo "Saldo: R$ " . number_format($_SESSION["saldoBanco"], 2, ',', '.');
                        echo "</div>";
                    }

                    break;

                case 4:

                    echo "<div class='resultado'>";
                    echo "Limite disponível: R$ " . number_format($limite, 2, ',', '.');
                    echo "</div>";

                    break;

                case 5:

                    if ($valor <= 0) {

                        echo "<div class='resultado'>O valor da conta deve ser maior que zero.</div>";

                    } elseif ($valor > $_SESSION["saldoBanco"]) {

                        echo "<div class='resultado'>Saldo insuficiente para pagar a conta.</div>";

                    } else {

                        $_SESSION["saldoBanco"] -= $valor;

                        echo "<div class='resultado'>";
                        echo "Conta paga com sucesso!<br>";
                        echo "Saldo: R$ " . number_format($_SESSION["saldoBanco"], 2, ',', '.');
                        echo "</div>";
                    }

                    break;

                case 6:

                    session_destroy();

                    echo "<div class='resultado'>Sistema encerrado.</div>";

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

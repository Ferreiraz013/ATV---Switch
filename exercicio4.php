<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>

    <div class="container">

        <h1>Calculadora</h1>

        <form method="POST">

            <label>Primeiro número:</label>
            <input type="number" step="any" name="numero1" required>

            <label>Segundo número:</label>
            <input type="number" step="any" name="numero2" required>

            <label>Operação:</label>

            <select name="operacao" required>
                <option value="">Selecione</option>
                <option value="1">Soma</option>
                <option value="2">Subtração</option>
                <option value="3">Multiplicação</option>
                <option value="4">Divisão</option>
            </select>

            <button type="submit">Calcular</button>
        </form>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero1 = $_POST["numero1"];
            $numero2 = $_POST["numero2"];
            $operacao = $_POST["operacao"];

            switch ($operacao) {

                case 1:

                    $resultado = $numero1 + $numero2;

                    echo "<div class='resultado'>Resultado: $resultado</div>";

                    break;

                case 2:

                    $resultado = $numero1 - $numero2;

                    echo "<div class='resultado'>Resultado: $resultado</div>";

                    break;

                case 3:

                    $resultado = $numero1 * $numero2;

                    echo "<div class='resultado'>Resultado: $resultado</div>";

                    break;

                case 4:

                    if ($numero2 == 0) {

                        echo "<div class='resultado'>Não é possível dividir por zero.</div>";

                    } else {

                        $resultado = $numero1 / $numero2;

                        echo "<div class='resultado'>Resultado: $resultado</div>";
                    }

                    break;

                default:

                    echo "<div class='resultado'>Operação inválida.</div>";
            }
        }
        ?>

        <a href="index.php" class="voltar">← Voltar</a>
    </div>

</body>
</html>

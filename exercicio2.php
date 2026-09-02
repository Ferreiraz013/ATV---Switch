<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meses do ano</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>

    <div class="container">
        <h1>Meses do Ano</h1>

        <form method="POST">
            <label>Digite um número de 1 a 12:</label>
            <input type="number" name="mes" required>
            <button type="submit">Verificar</button>
        </form>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mes = $_POST["mes"];
            switch ($mes) {

                case 1:
                    echo "<div class='resultado'>Janeiro</div>";
                    break;

                case 2:
                    echo "<div class='resultado'>Fevereiro</div>";
                    break;

                case 3:
                    echo "<div class='resultado'>Março</div>";
                    break;

                case 4:
                    echo "<div class='resultado'>Abril</div>";
                    break;

                case 5:
                    echo "<div class='resultado'>Maio</div>";
                    break;

                case 6:
                    echo "<div class='resultado'>Junho</div>";
                    break;

                case 7:
                    echo "<div class='resultado'>Julho</div>";
                    break;

                case 8:
                    echo "<div class='resultado'>Agosto</div>";
                    break;

                case 9:
                    echo "<div class='resultado'>Setembro</div>";
                    break;

                case 10:
                    echo "<div class='resultado'>Outubro</div>";
                    break;

                case 11:
                    echo "<div class='resultado'>Novembro</div>";
                    break;

                case 12:
                    echo "<div class='resultado'>Dezembro</div>";
                    break;

                default:
                    echo "<div class='resultado'>Esse mês não existe.</div>";
            }
        }
        ?>

        <a href="index.php" class="voltar">← Voltar</a>
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nota</title>

    <link rel="stylesheet" href="styles.css">

</head>

<body>

    <div class="container">

        <h1>Classificação de Nota</h1>

        <form method="POST">
            <label>Digite a nota:</label>
            <input type="number" name="nota" min="0" max="10" step="0.1" required>
            <button type="submit">Verificar</button>
        </form>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nota = $_POST["nota"];

            if ($nota < 0 || $nota > 10) {

                echo "<div class='resultado'>Nota inválida.</div>";

            } else {

                switch (true) {

                    case ($nota <= 4):
                        echo "<div class='resultado'>Insuficiente</div>";
                        break;

                    case ($nota <= 6):
                        echo "<div class='resultado'>Regular</div>";
                        break;

                    case ($nota <= 8):
                        echo "<div class='resultado'>Bom</div>";
                        break;

                    case ($nota <= 10):
                        echo "<div class='resultado'>Excelente</div>";
                        break;
                }
            }
        }
        ?>

        <a href="index.php" class="voltar">← Voltar</a>
    </div>

</body>
</html>

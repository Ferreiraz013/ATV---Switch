<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dias da Semana</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h1>Dias da Semana</h1>
        <form method="POST">
            <label>Digite um número de 1 a 7:</label>
            <input type="number" name="numero" required>
            <button type="submit">Verificar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero = $_POST["numero"];

            switch ($numero) {
                case 1:
                    echo "<div class='resultado'>Domingo</div>";
                    break;

                case 2:
                    echo "<div class='resultado'>Segunda-feira</div>";
                    break;

                case 3:
                    echo "<div class='resultado'>Terça-feira</div>";
                    break;

                case 4:
                    echo "<div class='resultado'>Quarta-feira</div>";
                    break;

                case 5:
                    echo "<div class='resultado'>Quinta-feira</div>";
                    break;

                case 6:
                    echo "<div class='resultado'>Sexta-feira</div>";
                    break;

                case 7:
                    echo "<div class='resultado'>Sábado</div>";
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

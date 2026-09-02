<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semáforo</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>

    <div class="container">

        <h1>Semáforo</h1>

        <form method="POST">
            <label>Escolha uma opção:</label>

            <select name="cor" required>
                <option value="">Selecione</option>
                <option value="1">Vermelho</option>
                <option value="2">Amarelo</option>
                <option value="3">Verde</option>
            </select>

            <button type="submit">Verificar</button>
        </form>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cor = $_POST["cor"];
            switch ($cor) {

                case 1:
                    echo "<div class='resultado'>Pare!</div>";
                    break;

                case 2:
                    echo "<div class='resultado'>Atenção!</div>";
                    break;

                case 3:
                    echo "<div class='resultado'>Siga!</div>";
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>BANCO DE DADOS</title>
</head>

<body>
    <?php
    require_once 'includes/banco.php';
    require_once 'includes/thumb.php';
    ?>
    <main id="main">
        <?php require_once 'header.php';
        $c = $_GET['cod'] ?? 0;
        $busca = $banco->query("select * from jogos where cod = $c");
        ?>
        <h1>Detalhes do Jogo</h1>
        <table class="detalhes">
            <?php
            if (!$busca) {
                echo "<tr><td>Busca falhou!";
            } else {
                if ($busca->num_rows == 1) {
                    $reg = $busca->fetch_object();
                    $t = thumb($reg->capa);
                    echo "<tr><td rowspan='3'><img src='$t' class='full'>";
                    echo "<td><h2>$reg->nome</h2>";
                    echo "Nota: " . number_format($reg->nota, 1) . "/ 10";
                    echo "<tr><td>$reg->descricao ";
                    echo "<td>ADM";
                } else {
                    echo "<tr><td>Nenhum Registro encontrado!";
                }
            }
            ?>
        </table>
        <a href="index.php"><img src="icones/icoback.png"></a>
    </main>
    <?php require_once 'footer.php' ?>
</body>

</html>
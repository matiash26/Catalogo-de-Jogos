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
    include_once 'includes/banco.php';
    require_once 'includes/thumb.php';
    $ordem = $_GET['o'] ?? "n";
    $chave = $_GET['c'] ?? "";
    ?>
    <main id="main">
        <?php require_once 'header.php'; ?>
        <h1>Banco de Dados</h1>
        <form method="get" id="busca" action="index.php">
            <a href="index.php?o=n">Ordenar: Nome</a> |
            <a href="index.php?o=p">Produtora</a> |
            <a href="index.php?o=na">Nota Alta</a> |
            <a href="index.php?o=nb">Nota Baixa</a> |
            <a href="index.php">Mostrar todos</a> |
            Buscar: <input type="text" name="c" size="10" maxlength="40" />
            <input type="submit" value="Ok">
        </form>
        <table class="listagem">
            <?php
            $q = "select j.cod, j.nome, j.capa, g.genero, p.produtora from jogos j 
            join genero g on j.genero = g.cod
            join produtoras p on j.produtora = p.cod ";

            if(!empty($chave)) {
                $q .= "WHERE j.nome like '%$chave%' OR p.produtora like '%$chave%'OR g.genero like '%$chave%'";

            }
            switch ($ordem) {
                case "p";
                    $q .= "ORDER BY p.produtora";
                    break;
                case "na";
                    $q .= "ORDER BY j.nota DESC";
                    break;
                case "nb";
                    $q .= "ORDER BY j.nota ASC";
                    break;
                default:
                    $q .= "ORDER BY j.nome";
                    break;
            }
            $busca = $banco->query($q);
            if (!$busca) {
                echo "<tr><td>Infelizmente a busca deu errado";
            } else {
                if ($busca->num_rows == 0) {
                    echo "<tr><td>Nenhum Registro encontrado";
                } else {
                    while ($reg = $busca->fetch_object()) {
                        $t = thumb($reg->capa);
                        echo "
                        <tr>
                            <td><img src='$t' class='mini'/>
                            <td><a href='detalhe.php?cod=$reg->cod'>$reg->nome</a>";
                        echo " [$reg->genero]";
                        echo "<br>";
                        echo "$reg->produtora";
                        echo "<td>ADM";
                    }
                }
            }
            ?>
        </table>
    </main>
    <?php
    require_once 'footer.php';
    ?>
</body>

</html>
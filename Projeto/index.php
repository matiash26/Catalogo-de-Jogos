<?php require_once 'config.php'; ?>
<?php require_once 'funcao/funcao.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Banco de Dados</title>
</head>
<body>
    <main>
        <h1>Banco de Dados</h1>
        <table class="listagem">
            <?php
            $bd_exec = $con->prepare('select j.cod, j.capa, j.nome, g.genero, p.produtora from jogos j
            join genero g on j.genero = g.cod
            join produtoras p on j.produtora = p.cod');
            $bd_exec->execute();
            while($row = $bd_exec->fetch(PDO::FETCH_OBJ)){
                $capa = thumb($row->capa);
                echo"<tr>
                        <td><img src='$capa'class='mini'/>
                        <td><a href='detalhes.php?cod=$row->cod'>$row->nome</a>";
                        echo" [$row->produtora]";
                        echo"<br>$row->produtora";
                        echo"<td>Adm";
            }
            ?>
            </tr>
        </table>
    </main>
    <?php include_once 'footer.php';?>
</body>
</html>
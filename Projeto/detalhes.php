<?php require_once 'config.php'; ?>
<?php require_once 'funcao/funcao.php'; ?>
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
        <?php
        $cod = $_GET['cod'] ?? 0;
        $bd_ex = $con->prepare('select * from jogos where cod = :codigo');
        $bd_ex->bindParam(':codigo', $cod);
        $bd_ex->execute();
        $row =  $bd_ex->fetch(PDO::FETCH_OBJ);
        ?>
        <h1>Detalhes do jogo</h1>
        <table class="detalhes">
            <?php
            if(!$bd_ex){
                echo"<tr><td>Busca falhou!";
            }else{
                if($bd_ex->rowCount() == 1){
                    $t = thumb($row->capa);
                    echo "<tr><td rowspan='3'><img src= '$t' class = 'full'/>";
                    echo"<td><h2>$row->nome</h2>";
                    echo"<strong>$row->nota / 10.00</strong>";
                    echo"<tr><td>$row->descricao";
                    echo"<td>ADM";
                
                }else{
                    echo"<tr><td>Nenhum Registro encontrado!";
                }
            }
            ?>
        </table>
        <a href='index.php'><img src="icones/icoback.png" alt="Voltar página"></a>
    </main>
    <?php include_once 'footer.php';?>
</body>

</html>
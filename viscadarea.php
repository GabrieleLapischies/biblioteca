<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de cadastro</title>
    <link rel="stylesheet" type="text/css"  href="css/style.css">
</head>
<body>
    <header>
        <div>
            <p>Sistema de Empréstimo de Livros</p>
        </div>
    </header>
    <nav class="naveg">
            <div>
                <p class="cnaveg"><a href="index.php">Página inicial</a></p>
            </div>
            <div>
                <p class="cnaveg"><a href="pagcadastro.php">Página de Cadastro</a></p>
            </div>
            <div>
                <p class="cnaveg"><a href="pagviscad.php">Visualização de Cadastro</a></p>
            </div>
            <div>
                <p class="cnaveg"><a href="formreservalivro.php">Reserva de Livros</a></p>
            </div>
            <div>
                <p class="cnaveg"><a href="formdevolvelivro.php">Devolução de Livros</a></p>
            </div>         
    </nav>
    <a href="javascript:window.history.go(-1)">Voltar</a>
    <div class="conteudo">
        <p class="p1">Áreas cadastradas</p>
        <table border="1">
            <tr>
                <th align="center">Área</th>   
            </tr>
        <?php
            include_once 'conecta.php';
            
            $sql = "select nome from area order by nome; ";
            $res = mysqli_query($conexao, $sql);
           
            while ($area = mysqli_fetch_array($res)) { 
                echo "<tr>";

                echo "<td>" . $area['nome'] . "</td>";           
            
                echo "</tr>";
            }
        ?>
    </div> 
</body>
</html>
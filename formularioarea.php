<?php
    include_once 'conecta.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de area</title>
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
    <section class="sect">
    <div class="conteudo">
    <form id="formc" method="post">
        <p class="p1"> Formulário de cadastro da área do livro </p>

        <label> ID: <input name="id" type="text" id="id_area"></label><br>
        <label> Nome da área: <input name="nome" type="text" id="nomearea"></label><br>
        
        <input name="cad" type="submit" id="cad" value="Cadastrar">
        <input name="limp" type="reset" id="limp" value="Limpar">
    </form>

    <?php
    //cadastrando as áreas
     
    if (isset($_POST['cad'])){
        header('Location: formularioarea.php');
        // notificação de cadastro com sucesso

        $nome_area = $_POST['nome'];
        $cod_area = $_POST['id'];

        $sql = "insert into area (nome) values ('$nome_area')";
        $res = mysqli_query($conexao, $sql);

        mysqli_close($conexao);

    }
    ?>
    </div>
    </section>
    
</body>
</html>
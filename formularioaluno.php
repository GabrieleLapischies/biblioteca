<?php
    include_once 'conecta.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" type="text/css"  href="css/style.css">
</head>
<body>
    <header> <!-- Cabeçalho do sistema -->
        <div>
            <p>Sistema de Empréstimo de Livros</p>
        </div>
    </header>
    <nav class="naveg"><!-- Menu de navegação do sistema-->
            <div>                                <!-- Cada 'div' dentro do 'nav' inderiza a página através da âncora, para a página selecionada -->
                <p class="cnaveg"><a href="index.php">Página inicial</a></p>  <!-- inderiza para a página inicial ('index.php') -->
            </div>
            <div>
                <p class="cnaveg"><a href="pagcadastro.php">Página de Cadastro</a></p>  <!-- inderiza para a página de cadastro ('pagcadastro.php'), onde informa os diversos tipos de cadastro do sistema -->
            </div>
            <div>
                <p class="cnaveg"><a href="pagviscad.php">Visualização de Cadastro</a></p>  <!-- inderiza para a página de visualização de cadastro ('pagviscad.php'), onde informa os diversos tipos de visualização de cadastro existentes no sistema -->
            </div>
            <div>
                <p class="cnaveg"><a href="formreservalivro.php">Reserva de Livros</a></p>  <!-- inderiza para a página de reserva/empréstimo de livros ('formreservalivro.php'), onde é possível coletar as informações para realizar o empréstimo do livro ao aluno -->
            </div>
            <div>
                <p class="cnaveg"><a href="formdevolvelivro.php">Devolução de Livros</a></p>  <!-- inderiza para a página de devolução de livros ('formdevolvelivro.php'), onde é possível receber os dados do livro devolvido -->
            </div>         
    </nav>
    <a href="javascript:window.history.go(-1)">Voltar</a> <!-- Essa âncora com o javascript foi utilizada para retroceder as páginas do sistema -->
    <section class="sect">  <!-- Sessão do sistema -->
    <div class="conteudo">  <!-- Essa 'div' contém o conteúdo do corpo do sistema -->    
    <form id="formc" method="post">   <!-- Formulário para cadastrar os alunos. Esse formulário, quando enviado,
     é automaticamente direcionado para a página 'cadastra_aluno.php', onde é realizado o cadastro e, por assim dizer, a inserção dos dados no banco -->
        <p class="p1"> Formulário de cadastro de aluno </p>

        <label> Nome: <input name="nome" type="text" id="nomealuno"></label><br>                <!-- corpo do formulário - nome do aluno -->
        <label> Matrícula: <input name="matr" type="text" id="matr"></label><br>                <!-- corpo do formulário - matrícula do aluno -->
        <label> CPF: <input name="cpf" type="text" id="cpfaluno"></label><br>                   <!-- corpo do formulário - cpf do aluno -->
        <label> Email: <input name="email" type="text" id="emailaluno"></label><br>             <!-- corpo do formulário - email do aluno -->
        <label> Data de Nascimento: <input name="dtnasc" type="date" id="dtnasc"></label><br>   <!-- corpo do formulário - data de nascimento do aluno -->
       
        
        <input name="cad" type="submit" id="cad" value="Cadastrar">     <!-- corpo do formulário - botão de cadastro -->
        <input name="limp" type="reset" id="limp" value="Limpar">       <!-- corpo do formulário - botão de limpar os dados -->
    </form>

    <?php 
    //cadastrando os alunos pelo php
       
    if (isset($_POST['cad'])){
    
        header('Location: formularioaluno.php');
        // notificação de cadastro com sucesso
    

        $nome = $_POST['nome'];
        $matr = $_POST['matr'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $dtnasc = $_POST['dtnasc'];

        $sql = "insert into aluno (nome, matricula, cpf, email, data_nasc) values ('$nome', '$matr', '$cpf', '$email', '$dtnasc')";

        $res = mysqli_query($conexao, $sql);

        mysqli_close($conexao);
    }   
    ?>
    </div>
    </section> 
  
    

</body>
</html>
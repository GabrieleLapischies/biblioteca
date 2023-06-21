<?php
    include_once 'conecta.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devolução de Livro</title>
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
    <form id="formc" action="devolve_livro.php" method="post">
        <p class="p1"> Devolução de livro </p>
        <table border="1">
            <tr>
                <td align="center"><input id="cbtotal" name="btotal" type="checkbox"></td>
                <td>Título</td>
                <td>Aluno</td>
                <td>Data de Retirada</td>
                <td>Data de Entrega</td>
                <!--<td>Data de Devolução</td>-->
            </tr>
        <?php

            $sql = "select titulo, aluno.nome, data_retirada, data_entrega, data_devolucao from reserva
            inner join livro on reserva.id_livro = livro.id
            inner join aluno on reserva.matricula = aluno.matricula where data_devolucao is null;";

            $res = mysqli_query($conexao, $sql);
            
            while ($devolv = mysqli_fetch_array($res)) {             
                echo "<tr>";
                echo "<td><input name='caixa_tabela' type='checkbox' ></td>";
                echo "<td>". $devolv['titulo'] ."</td>";
                echo "<td>". $devolv['nome'] ."</td>";
                echo "<td>". $devolv['data_retirada'] ."</td>";
                echo "<td>". $devolv['data_entrega'] ."</td>";
                echo "<td>". $devolv['data_devolucao'] ."</td>";

                /*usar esse vetor de devolução para a página de visualização dos livros e não na página de devolução*/
                
                $sql = "insert into reserva (data_entrega, status, matricula, id_livro, data_devolucao)
                values ('$dt_entr', '1', '".$aluno['matricula']."', '$idlivro', curdate())"; 
                echo "</tr>";    
           
            }
            echo "</table>";
        ?>
        </table>
        
               
        
        <input name="reserv" type="submit" id="reserv" value="Confirmar">
        <input name="cancelar" type="reset" id="canc" value="Cancelar">
    </form>
    </div>
    </section>
    
</body>
</html>
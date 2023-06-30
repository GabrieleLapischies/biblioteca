<?php
    include_once 'conecta.php';
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Livro</title>
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
        <p class="p1"> Reserva de livro </p>

        <label> Aluno(a):
          
            <select name="select_aluno">
                <option>Selecione</option>
                <?php
                
                $sql = "select * from aluno";

                $res = mysqli_query($conexao, $sql);
                $linhas = mysqli_num_rows($res);
                
                for ($i = 0; $i < $linhas; $i++){
                    $aluno = mysqli_fetch_array($res);
                    echo "<option name='matri' value = ".$aluno['matricula'].">";
                    echo $aluno['nome'];
                    echo "</option><br>";
                }

                ?>
            </select></label><br>
        <br>            
        Data de Entrega:
        <input name="dat_entr" type="date"><br> 
        <br>  
        
        <table id="tlivro" border="1">
            <th colspan="3">Livros</th>
            <tr>
                <th></th>
                <th>Título</th>
                <th>Autor</th>
            </tr>
        

        <?php   
            $sql = "select titulo, livro.id, nome from livro inner join area on livro.id_area = area.id where status = 0 order by titulo asc;";
            
            $res = mysqli_query($conexao, $sql);
            $linhas = mysqli_num_rows($res);
            
            while ($resv = mysqli_fetch_array($res)){
                echo "<tr><td><input name='idl' type='hidden' value='".$resv['id']."'>";
                echo "<input name='book' type='checkbox'></td><td>". $resv['titulo'] . "</td><td>". $resv['nome'] . "</td>";   
            }
        ?>
        </table>
        <input name="reserv" type="submit" id="reserv" value="Reservar">
        <input name="limp" type="reset" id="limp" value="Cancelar">
    </form>
    <?php
        if (isset($_POST['reserv'])){
            
                                                
            $dt_entr = $_POST['dat_entr'];                                       
            $matricula = $aluno['matricula'];     
            $idl = $_POST['idl'];
    
            $sql1 = "update livro set status = 1 where id = $idl";
            $sql2 = "insert into reserva (id_livro, matricula, status, data_entrega, data_retirada) 
            values ('$idl','$matricula', 1, '$dt_entr', curdate())";
            
            // 
            $res = mysqli_query($conexao, $sql1, $sql2);  

            header('Location: formreservalivro.php');



            $sql = "update reserva set data_entrega='$dt_entr', data_retirada='now()', status=1, matricula='".$aluno['matricula']."', id_livro='". $_POST['idlivro'] ."' where id_livro = livro.id ";
             
            $res = mysqli_query($conexao, $sql);  

            header('Location: formreservalivro.php');
        }

    ?>
    </div>
    </section>
    
</body>
</html>

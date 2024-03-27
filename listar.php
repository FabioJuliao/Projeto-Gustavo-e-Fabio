<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Listagem de usuarios</title>
</head>
<body>
<a href="index.php" class="w3-display-topleft">
    <i class="fa fa-arrow-circle-left w3-large w3-teal w3-button w3-xxlarge"></i>     
</a> 
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "usbw";
            $dbname = "pwii";
            $conexao = new mysqli($servername, $username, $password, $dbname);
            if ($conexao->connect_error) {
                die("Connection failed: " . $conexao->connect_error);
            } 
                echo '
                <div class="w3-paddingw3-content w3-half w3-display-topmiddle w3-margin">
                <h1 class="w3-center w3-teal w3-round-large w3-margin">Listagem de Alunos</h1>
                <table class="w3-table-all w3-centered">
                <thead>   
                    <tr class="w3-center w3-teal">
                        <th>Código</th>
                        <th>nome</th>
                        <th>sobrenome</th>
                        <th>email</th>
                        <th>telefone</th>
                        <th>cargo</th>
                        <th>Atualizar</th>
                    </tr>
                <thead>
                ';
                $sql = "SELECT * FROM usuario" ;
                $resultado = $conexao->query($sql);
                if($resultado != null) {
                    foreach($resultado as $linha) {
                        echo '<tr>';
                        // Verifica se o índice 'idusuario' está definido no array $linha
                        if(isset($linha['idusuario'])) {
                            echo '<td>'.$linha['idusuario'].'</td>';
                        } else {
                            echo '<td>Não disponível</td>';
                        }
                        echo '<td>'.$linha['nome'].'</td>';
                        echo '<td>'.$linha['sobrenome'].'</td>';
                        echo '<td>'.$linha['email'].'</td>';
                        echo '<td>'.$linha['telefone'].'</td>';
                        echo '<td>'.$linha['cargo'].'</td>';
                        // Adiciona verificações semelhantes para os links de excluir e atualizar
                        if(isset($linha['idusuario'])) {
                            echo '<td><a href="excluir.php?id='.$linha['idusuario'].'&nome='.$linha['nome'].'&sobrenome='.$linha['sobrenome'].'&email='.$linha['email'].'&telefone='.$linha['telefone'].'&cargo='.$linha['cargo'].'"><i class="fa fa-user-times w3-large w3-text-teal"></i> </a></td>';
                            echo '<td><a href="atualizar.php?id='.$linha['idusuario'].'&nome='.$linha['nome'].'&sobrenome='.$linha['sobrenome'].'&email='.$linha['email'].'&telefone='.$linha['telefone'].'&cargo='.$linha['cargo'].'"><i class="fa fa-refresh w3-large w3-text-teal""></i></a></td>';
                        } else {
                            echo '<td>Não disponível</td>';
                            echo '<td>Não disponível</td>';
                        }
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="7">Nenhum registro encontrado.</td></tr>';
                }
                echo '
                    </table>
                </div>';
            $conexao->close();
        ?>
    </div>
</body>
</html>

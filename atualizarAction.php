<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Atualização - MYSQLI</title>
</head>
<body>
<div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle" >
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "usbw";
        $dbname = "pwii";
        $conexao = new mysqli($servername, $username, $password, $dbname);
        if ($conexao->connect_error) {
            die("Connection failed: " . $conexao->connect_error);
        } 
        $sql = "UPDATE usuario SET nome = '".$_POST['txtnome']."', sobrenome = '".$_POST['txtsobrenome']."', email = '".$_POST['txtemail']."', telefone = '".$_POST['txttelefone']."', cargo='".$_POST['txtcargo']."' WHERE idusuario =". $_POST['txtID'].";";
     
        if ($conexao->query($sql) === TRUE) {
            echo '
            <a href="listar.php">
                <h1 class="w3-button w3-teal">Cadastro realizado com sucesso! </h1>
            </a> 
            ';
        $id = mysqli_insert_id($conexao);
            
        } else {
            echo '
            <a href="listar.php">
                <h1 class="w3-button w3-teal">ERRO! </h1>
            </a> 
            ';
        }
        $conexao->close();
    ?>
</div>
</body>
</html>
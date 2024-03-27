<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Cadastro - Usuario</title>
</head>
<body>
<div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "usbw";
        $dbname = "pwii";
        
        // Conectar ao banco de dados
        $conexao = new mysqli($servername, $username, $password, $dbname);
        if ($conexao->connect_error) {
            die("Connection failed: " . $conexao->connect_error);
        } 
        
        // Preparar e executar a declaração de inserção
        $stmt = $conexao->prepare("INSERT INTO usuario (nome, sobrenome, email, telefone, cargo) VALUES (?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Error preparing statement: " . $conexao->error);
        }
        
        $stmt->bind_param("sssss", $nome, $sobrenome, $email, $telefone, $cargo);
        
        $nome = $_POST['txtNome'];
        $sobrenome = $_POST['txtsobrenome'];
        $email = $_POST['txtemail'];
        $telefone = $_POST['txttelefone'];
        $cargo = $_POST['txtcargo'];
        
        if ($stmt->execute()) {
            echo '<a href="index.php"><h1 class="w3-button w3-teal">Cadastro realizado com sucesso! </h1></a>';
        } else {
            echo '<a href="index.php"><h1 class="w3-button w3-teal">ERRO! </h1></a>';
        }
        
        $stmt->close();
        $conexao->close();
    } else {
        echo '<a href="index.php"><h1 class="w3-button w3-teal">Acesso inválido! </h1></a>';
    }
    ?>
</div>
</body>
</html>

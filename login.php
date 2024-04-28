<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BVBD";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['usuario'], $_POST['senha'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Conectar ao banco de dados
    $conn = new mysqli('localhost', 'root', '', 'BVBD');

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Consulta SQL para buscar o usuário
    $sql = "SELECT * FROM USUARIOS WHERE USUARIO = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param('s', $usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_object();

    // Verificar se a senha está correta
    if (password_verify($senha, $user->SENHA)) {
        // Autenticação bem-sucedida, definir a variável de sessão
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['usuario'] = $user->USUARIO;

        echo 'Bem-vindo ' . $_SESSION['usuario'] . '!';
    } else {
        echo 'Usuário ou senha incorretos!';
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<body>
<form action="" method="post">
    <label for="usuario">Usuário:</label><br>
    <input type="text" id="usuario" name="usuario"><br>
    <label for="senha">Senha:</label><br>
    <input type="password" id="senha" name="senha"><br><br>
    <input type="submit" value="Login">
</form> 
</body>
</html>

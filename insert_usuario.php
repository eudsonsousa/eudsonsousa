<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BVBD";

// Crie a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO USUARIOS (USUARIO, SENHA, CARGO) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $usuario, $senha, $cargo);

// set parameters and execute
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$cargo = $_POST["cargo"];
$stmt->execute();

echo "Novo registro criado com sucesso";

$stmt->close();
$conn->close();


if ($conn->query($sql) === TRUE) {
  echo "Novo registro criado com sucesso";
  header("Location: form.php");
} else {
  echo "Erro: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
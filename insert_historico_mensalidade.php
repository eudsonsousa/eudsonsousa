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
$stmt = $conn->prepare("INSERT INTO HISTORICO_MENSALIDADE (DATA_VENCIMENTO, FORMAPAGAMENTO) VALUES (?, ?)");
$stmt->bind_param("ss", $data_vencimento, $formapagamento);

// set parameters and execute
$data_vencimento = $_POST["data_vencimento"];
$formapagamento = $_POST["formapagamento"];
$stmt->execute();

echo "Novo registro criado com sucesso";

$stmt->close();
$conn->close();
?>

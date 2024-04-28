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
$stmt = $conn->prepare("INSERT INTO RECEBER (CLIENTE_ID, DATAVENCIMENTO, DATAPAGAMENTO, ESPECIEPAGAMENTO) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $cliente_id, $datavencimento, $datapagamento, $especiepagamento);

// set parameters and execute
$cliente_id = $_POST["cliente_id"];
$datavencimento = $_POST["datavencimento"];
$datapagamento = $_POST["datapagamento"];
$especiepagamento = $_POST["especiepagamento"];
$stmt->execute();

echo "Novo registro criado com sucesso";

$stmt->close();
$conn->close();

?>

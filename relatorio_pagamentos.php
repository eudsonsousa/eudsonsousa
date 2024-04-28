<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BVBD";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT ID, CLIENTE_ID, DATAVENCIMENTO, DATAPAGAMENTO, ESPECIEPAGAMENTO FROM RECEBER WHERE DATAPAGAMENTO IS NOT NULL";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["ID"]. " - Cliente ID: " . $row["CLIENTE_ID"]. " - Data Vencimento: " . $row["DATAVENCIMENTO"]. " - Data Pagamento: " . $row["DATAPAGAMENTO"]. " - Espécie Pagamento: " . $row["ESPECIEPAGAMENTO"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

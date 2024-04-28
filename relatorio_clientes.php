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

$sql = "SELECT ID, RAZAO_SOCIAL, VALOR_MENSALIDADE, DATA_VENCIMENTO FROM CLIENTES";
$result = $conn->query($sql);

echo "<style>
table {
  width: 100%;
  border-collapse: collapse;
  font-family: Arial, sans-serif;
}
th {
  background-color: #0000FF;
  color: white;
  padding: 10px;
}
td {
  border: 1px solid #ddd;
  padding: 10px;
}
</style>";

if ($result->num_rows > 0) {
  echo "<table>";
  echo "<tr><th>ID</th><th>Razão Social</th><th>Valor Mensalidade</th><th>Data Vencimento</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["RAZAO_SOCIAL"]. "</td><td>" . $row["VALOR_MENSALIDADE"]. "</td><td>" . $row["DATA_VENCIMENTO"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>

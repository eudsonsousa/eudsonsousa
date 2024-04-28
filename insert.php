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

$RAZAO_SOCIAL = $_POST['RAZAO_SOCIAL'];
$FANTASIA = $_POST['FANTASIA'];
$ENDERECO = $_POST['ENDERECO'];
$COMPLEMENTO =$_POST['COMPLEMENTO'];
$BAIRRO = $_POST['BAIRRO'];
$CIDADE = $_POST['CIDADE'];
$UF = $_POST['UF'];
$CEP = $_POST['CEP'];
$PAIS = $_POST['PAIS'];
$RG = $_POST['RG'];
$CPF = $_POST['CPF'];
$CNPJ = $_POST['CNPJ'];
$IE = $_POST['IE'];
$TELEFONE = $_POST['TELEFONE'];
$EMAIL = $_POST['EMAIL'];
$SISTEMA = $_POST['SISTEMA'];
$MODULOS_ADICIONAIS  = $_POST['MODULOS_ADICIONAIS'];
$VALOR_MENSALIDADE = $_POST['VALOR_MENSALIDADE'];
$STATUS_CLIENTE = $_POST['STATUS_CLIENTE'];
$DATA_VENCIMENTO = $_POST['DATA_VENCIMENTO'];
$DATA_CADASTRO = $_POST['DATA_CADASTRO'];

$sql = "INSERT INTO CLIENTES (RAZAO_SOCIAL, FANTASIA, ENDERECO, COMPLEMENTO, BAIRRO, CIDADE, UF, CEP, PAIS, RG, CPF, CNPJ, IE, TELEFONE, EMAIL, SISTEMA, MODULOS_ADICIONAIS, VALOR_MENSALIDADE, STATUS_CLIENTE, DATA_VENCIMENTO, DATA_CADASTRO)
VALUES ('$RAZAO_SOCIAL', '$FANTASIA', '$ENDERECO', '$COMPLEMENTO', '$BAIRRO', '$CIDADE', '$UF', '$CEP', '$PAIS', '$RG', '$CPF', '$CNPJ', '$IE', '$TELEFONE', '$EMAIL', '$SISTEMA', '$MODULOS_ADICIONAIS', '$VALOR_MENSALIDADE', '$STATUS_CLIENTE', '$DATA_VENCIMENTO', '$DATA_CADASTRO')"; 


if ($conn->query($sql) === TRUE) {
  echo "Novo registro criado com sucesso";
  header("Location: form.php");
} else {
  echo "Erro: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>

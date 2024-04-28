<?php
// Iniciar a sessão no início do arquivo
session_start();

// Verificar se a senha está correta
if (password_verify($senha, $user->SENHA)) {
  // Autenticação bem-sucedida, definir a variável de sessão
  $_SESSION['loggedin'] = TRUE;
  $_SESSION['usuario'] = $user->USUARIO;

  // Redirecionar para a página index.php
  header('Location: index.php');
  exit;
} else {
  echo 'Usuário ou senha incorretos!';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BV SYSTEM SOLUÇOES & CERTIFICAÇÃO DIGITAL</title>
    <link rel="stylesheet" type="text/css" href="style_index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <h1>MENU PRINCIPAL</h1>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<p><button onclick="location.href='form_cliente.php'">CADASTRO DE CLIENTES</button></p>
<p><button onclick="location.href='form_usuario.php'">CADASTRO DE USUARIOS</button></p>
<p><button onclick="location.href='form_receber.php'">CADASTRO DE MENSALIDADES</button></p>
<p><button onclick="location.href='form_historico_mensalidade.php'">HISTORICO DE MENSALIDADES</button></p>
<p><button onclick="location.href='relatorio_clientes.php'">Relatório de Clientes</button></p>
<p><button onclick="location.href='relatorio_pagamentos.php'">Relatório de Pagamentos</button></p>
<p><button onclick="location.href='relatorio_pendencias.php'">Relatório de Pendências</button></p>

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

// TABELA CLIENTES

$result = $conn->query("SHOW TABLES LIKE 'CLIENTES'");
if($result->num_rows == 0) {

$sql = "CREATE TABLE CLIENTES (
    ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    RAZAO_SOCIAL VARCHAR(100) NOT NULL,
    FANTASIA VARCHAR(80) NOT NULL,
    ENDERECO VARCHAR(100) NOT NULL,
    COMPLEMENTO VARCHAR(50) NULL,
    BAIRRO VARCHAR(45) NOT NULL,
    CIDADE VARCHAR(20) NOT NULL,
    UF VARCHAR(2) NOT NULL,
    PAIS VARCHAR(15) NOT NULL,
    CEP VARCHAR(9) NOT NULL,
    RG VARCHAR(20) NULL,
    CPF VARCHAR(20) NULL,
    CNPJ VARCHAR(20) NULL,
    IE VARCHAR(20) NULL,
    TELEFONE VARCHAR(11) NOT NULL,
    EMAIL VARCHAR(100) NULL,
    SISTEMA VARCHAR(100) NOT NULL,
    MODULOS_ADICIONAIS VARCHAR (255) NOT NULL,
    VALOR_MENSALIDADE DECIMAL(10,2) NOT NULL,
    STATUS_CLIENTE VARCHAR (20) NOT NULL,
    DATA_VENCIMENTO DATE NOT NULL,
    DATA_CADASTRO TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";


if ($conn->query($sql) === TRUE) {
    echo "Tabela CLIENTES criada com sucesso";
  } else {
    echo "Erro ao criar tabela CLIENTES: " . $conn->error;
  }
}
// TABELA USUARIOS

$result = $conn->query("SHOW TABLES LIKE 'USUARIOS'");
if($result->num_rows == 0) {

$sql = "CREATE TABLE USUARIOS (
    ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    USUARIO VARCHAR(30) NOT NULL,
    SENHA VARCHAR(12) NOT NULL,
    CARGO VARCHAR(50) NOT NULL,
    DATA_CADASTRO TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";


if ($conn->query($sql) === TRUE) {
    echo "Tabela USUARIOS criada com sucesso";
  } else {
    echo "Erro ao criar tabela USUARIOS: " . $conn->error;
  }
}

// TABELA CONTAS A RECEBER

$result = $conn->query("SHOW TABLES LIKE 'RECEBER'");
if($result->num_rows == 0) {

$sql = "CREATE TABLE RECEBER (
    ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    CLIENTE_ID INT(6) NOT NULL,
    DATAVENCIMENTO DATE NOT NULL,
    DATAPAGAMENTO DATE NULL,
    ESPECIEPAGAMENTO VARCHAR (15) NOT NULL,
    DATACADASTRO TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    echo "Tabela RECEBER criada com sucesso";
  } else {
    echo "Erro ao criar tabela RECEBER: " . $conn->error;
  }
}
// HISTORIO DE MENSALIDADES

$result = $conn->query("SHOW TABLES LIKE 'HISTORICO_MENSALIDADE'");
if($result->num_rows == 0) {

$sql = "CREATE TABLE HISTORICO_MENSALIDADE (
    ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    DATA_VENCIMENTO DATE NOT NULL,
    FORMAPAGAMENTO VARCHAR(12) NOT NULL,
    DATACADASTRO TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";   

if ($conn->query($sql) === TRUE) {
    echo "Tabela HISTORICO_MENSALIDADE criada com sucesso";
  } else {
    echo "Erro ao criar tabela HISTORICO_MENSALIDADE: " . $conn->error;
  }
}
$conn->close();
?>


</body>
</html>
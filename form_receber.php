<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="style_receber.css">
    </head>
<body>

<h2>Formulário de Recebimento</h2>

<form action="insert_receber.php" method="post">
  ID do Cliente:<br>
  <input type="text" name="cliente_id" value="">
  <br>
  Data de Vencimento:<br>
  <input type="date" name="datavencimento" value="">
  <br>
  Data de Pagamento:<br>
  <input type="date" name="datapagamento" value="">
  <br>
  Espécie de Pagamento:<br>
  <input type="text" name="especiepagamento" value="">
  <br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>

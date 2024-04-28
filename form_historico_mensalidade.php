<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="style_hist_mensal.css">
    </head>
<body>

<h2>Formulário de Histórico de Mensalidade</h2>

<form action="insert_historico_mensalidade.php" method="post">
  Data de Vencimento:<br>
  <input type="date" name="data_vencimento" value="">
  <br>
  Forma de Pagamento:<br>
  <input type="text" name="formapagamento" value="">
  <br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>

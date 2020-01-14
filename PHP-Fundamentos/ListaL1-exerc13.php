<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Fundamentos do PHP </title> 
</head>
	
<body> 
	<h1> Elementos fundamentais da linguagem PHP - exercício 13 da lista L1</h1>
	
<?php
	//recebendo os dados do formulário
	$valorCompra = $_POST["valor"];
	
	//calculo de porcentagem
	$desconto = $valorCompra*0.1;
	$icms = $valorCompra*0.12;
	$comissao = $valorCompra*0.05;
	
	$descontoFormat = number_format($desconto, 2, ",", ".");
	$icmsFormat = number_format($icms, 2, ",", ".");
	$comissaoFormat = number_format($comissao, 2, ",", ".");
	
	echo "<p> Valor do desconto: R$ <strong>$descontoFormat</strong>; <br>
						Valor do ICMS: R$ <strong>$icmsFormat</strong>; <br>
						Valor do comissão: R$ <strong>$comissaoFormat</strong>.</p>"

?> 

</body> 
</html> 
<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Fundamentos do PHP </title> 
</head>
	
<body> 
	<h1> Elementos fundamentais da linguagem PHP - exercício 12 da lista L1</h1>
	
<?php
	//recebendo os dados do formulário
	$distancia = $_POST["distancia"];
	$consumo = $_POST["consumo"];
	$preco = $_POST["preco"];
	
	$gastolitros = $distancia/$consumo;
	$gastoreais = $preco*$gastolitros;
	
	$gastoreaisFormatada = number_format($gastoreais, 2, ",", ".");
	
	echo "<p> Maria gastará <strong><em>$gastolitros</strong></em> litros e custará R$<strong><em>$gastoreaisFormatada</strong></em>.</p>"

?> 

</body> 
</html> 
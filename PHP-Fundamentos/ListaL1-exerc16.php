<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Fundamentos do PHP </title> 
	<link rel="stylesheet" href="formularios.css"> 
</head> 

<body>
	<h1> Elementos fundamentais da linguagem PHP </h1>
	
	<?php  
		define("COTACAO", 3.75);
		$dolar = $_GET["dolar"];
		$reais = $dolar / COTACAO;
		
		$dolarFormat = number_format($dolar, 2, ',', '.');
		$reaisFormat = number_format($reais, 2, ',', '.');
		echo "<p> Valor em dólar: $dolarFormat <br>
				Conversão em reais: R$ $reaisFormat <br>
				Valor do câmbio: R$ ", COTACAO, "</p>";
	?>
</body> 
</html> 
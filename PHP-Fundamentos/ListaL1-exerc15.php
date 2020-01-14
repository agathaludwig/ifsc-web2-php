<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Fundamentos do PHP </title> 
	<link rel = "stylesheet" href="formularios.css"> 
</head> 

<body>
	<?php
		$numero = $_GET["numero"];

	// calculos potencia e raiz quadrada
	
	$raiz = sqrt($numero); 
	$cubo = pow($numero, 3); //parametros: base, expoente

	echo "<h1> Elementos fundamentais da linguagem PHP</h1>
			<p> Resultado: <br> 
				Número: $numero <br> 
				Raiz quadrada: $raiz<br> 
				Cubo: $cubo 
				</p>"
	?>
	
</body> 
</html> 
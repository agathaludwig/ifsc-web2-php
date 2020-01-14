<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Fundamentos do PHP </title> 
  <link rel = "stylesheet" href="formularios.css"> 
</head>
	
<body> 
	<h1> Elementos fundamentais da linguagem PHP</h1>
	
		<?php
			//recebendo os dados do formulário
			$fahre = $_POST["fahre"];
			
			// transformando a temperatura
			$celsius = ($fahre-32)*5/9;
			
			$celsiusFormat = number_format($celsius, 1, ",", ".");
			
			echo "<p> A temperatura <strong>$fahre</strong> F equivale a <strong>$celsiusFormat</strong>°C.</p>"
			
		?> 

</body> 
</html> 
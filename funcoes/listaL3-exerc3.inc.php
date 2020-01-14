<?php
	function testarValores($valor1, $valor2) {
		
		$valorTestado1 = filter_var($valor1, FILTER_VALIDATE_INT); 
		$valorTestado2 = filter_var($valor2, FILTER_VALIDATE_INT);

		if ($valorTestado1 === false OR $valorTestado2 === false OR $valorTestado2 < 0 OR $valorTestado1 < 0) {
			exit("<p>Um dos valores fornecidos não é válido. <br>
				Forneça um número inteiro maior ou igual a zero.</p>"); 
		}
	}

	function calcularRaiz($valor1, $valor2) {
		$resultado1 = sqrt($valor1);
		$resultado2 = sqrt($valor2);

		echo "<p>Confira os resultados: <br>
		Valor 1: $valor1;<br>
		Raiz 1: $resultado1;<br>
		Valor 2: $valor2;<br>
		Raiz 2: $resultado2;<br></p>";
	}
?>
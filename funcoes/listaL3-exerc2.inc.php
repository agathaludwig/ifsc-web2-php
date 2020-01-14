<?php
/* qualquer comando php 
	*tags html
	* comandos javascript
	* comando css

* em tese aceita todo tipo de extenção,
no entanto, para segurança o melho é php
sugestão: nome.inc.php
-----------------------------------------------BIBLIOTECA DE FUNÇÕES
*/
	function testarValores($valor1, $valor2) {
		
		$valorTestado1 = filter_var($valor1, FILTER_VALIDATE_INT); 
		$valorTestado2 = filter_var($valor2, FILTER_VALIDATE_INT);

		if ($valorTestado1 === false OR $valorTestado2 === false ) {
			exit("<p>Um dos valores fornecidos não é válido</p>"); // sai do programa
		}
	}

	function somar($valor1, $valor2) {
		$resultado = $valor1+$valor2;
		return $resultado;
	}

	function calcularCubo($soma) {
		$cubo = pow($soma, 3);
		return $cubo;
	}

	function mostrarResultado($valor1, $valor2, $soma, $cubo) {
		echo "<p>Confira o resultado: <br>
		Valor 1: $valor1;<br>
		Valor 2: $valor2;<br>
		Soma: $soma;<br>
		Cubo: $cubo;<br></p>";
	}
?>
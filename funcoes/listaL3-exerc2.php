<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Exercício 2 - Funções e Includes</title> 
		<link rel="stylesheet" href="formata-includes-funcoes.css">
</head> 

<body> 
	<h1> Funções </h1>
	
	<form action="#" method="post">  <!-- este atributo é npara que o php nao valide os dados do formulário automaticamente -->
		<fieldset>
			<legend> Exercício 2: Validação e Include</legend>
			<label class="alinha"> Forneça o primeiro valor inteiro </label>
			<input type="number" name = "valor1"> 
			<br>
			<label class="alinha"> Forneça o segundo valor inteiro </label>
			<input type="number" name = "valor2">
			<button type="submit" name="enviar">Validar e processar	</button>
		</fieldset>

		<?php 
		$nomeInclude = "listaL3-exerc2.inc.php";
		require_once $nomeInclude;
			if(isset($_POST["enviar"])){
			$valor1 = $_POST["valor1"];
			$valor2 = $_POST["valor2"];
			// invocar e testar dois dados são inteiros	
			testarValores($valor1, $valor2);

			// soma
			$soma = somar($valor1, $valor2);
			// cubo
			$cubo = calcularCubo($soma);
			// invocar função que mostra tudo
			mostrarResultado($valor1, $valor2, $soma, $cubo);
			}
		?>
	</form>
</body> 
</html> 
<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Exercício 3 - Funções e Includes</title> 
		<link rel="stylesheet" href="formata-includes-funcoes.css">
</head> 

<body> 
	<h1> Funções </h1>
	
	<form action="#" method="post">  <!-- este atributo é npara que o php nao valide os dados do formulário automaticamente -->
		<fieldset>
			<legend> Exercício 3</legend>
			<label class="alinha"> Forneça o primeiro valor inteiro maior ou igual a zero: </label>
			<input type="number" name = "valor1"> 
			<br>
			<label class="alinha"> Forneça o segundo valor inteiro  maior ou igual a zero: </label>
			<input type="number" name = "valor2">
			<button type="submit" name="enviar">Validar e processar	</button>
		</fieldset>

		<?php 
		$nomeInclude = "listaL3-exerc3.inc.php";
		require_once $nomeInclude;
			if(isset($_POST["enviar"])){
			$valor1 = $_POST["valor1"];
			$valor2 = $_POST["valor2"];
			// invocar e testar dois dados são inteiros	
			testarValores($valor1, $valor2);

			// raiz e mostrar
			calcularRaiz($valor1, $valor2);

			}
		?>
	</form>
</body> 
</html> 
<?php
	//criação o vetor a partir dos dados da tabela
	$capitais = array("Florianópolis" => 477000,
					"São Paulo" => 12100000,
					"João Pessoa" => 720950,
					"Salvador" => 2670000,
					'Porto Alegre' => 1480000);
?>

<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Exercício 2 </title> 
		<link rel="stylesheet" href="formata-matrizes.css">
</head> 

<body> 
	<h1> Vetores com PHP </h1>
	<form action="listaL2-exerc2.php" method="post">
		
		<fieldset>
			<legend> Execício 2 </legend>
			
			<label> Selecione uma capital: </label> <br>
			<?php
				foreach($capitais as $nome => $populacao)
					echo "<input type='radio' name='capitais' value='$nome'> $nome <br>";
			?> 
			<label class="alinha"> Forneça uma capital: </label>
			<input type="text" name="capital" autofocus class="maior"> <br>
			<br>
			<label class="alinha"> Selecione uma operação: </label>
			<select name="operacoes">
<!-- item a--> 	<option value="1">Mostrar população da capital selecionada</option>
<!-- item d--> 	<option value="2">Verificar população da capital inserida</option>

<!-- item b--> 	<option value="3">Mostrar tabela em ordem crescente por capital</option>
<!-- item c--> 	<option value="4">Mostrar relação ordem decrescente por população</option>
<!-- item e--> 	<option value="5">Mostrar média populacional</option>
<!-- item f--> 	<option value="6">Mostrar quantas capitais estão abaixo da média populacional</option>
<!-- item g--> 	<option value="7">Mostrar a capital de maior população</option>
<!-- item h--> 	<option value="8">Converter vetor em string e escrever o conteúdo</option>
<!-- item i--> 	<option value="9">Acrescentar manualmente mais capitais e mostrar em tabela</option>
			</select> <br>
			<br>	
		</fieldset>
		
		<button type="submit" name="enviar"> Executar operação selecionada </button>		
	</form>    
</body> 
</html> 
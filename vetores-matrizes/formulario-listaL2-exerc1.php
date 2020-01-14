<?php
	//criação o vetor a partir dos dados da tabela
	$alunos = array("Maria das Graças" => 6.5,
					"Paulo de Almeida" => 7.8,
					"Rogério da Silva" => 4.2,
					"Jerusa Fontes" => 8.5,
					'Alícia Marques' => 9.0,
					'Zenon Mendes' => 4.1);
																	
	//mesmo vetor, de outra forma
		$alunos = ["Maria das Graças" => 6.5,
					"Paulo de Almeida" => 7.8,
					"Rogério da Silva" => 4.2,
					"Jerusa Fontes" => 8.5,
					'Alícia Marques' => 9.0,
					'Zenon Mendes' => 4.1];
																
	//mesmo vetor, de outra forma
	$alunos["Maria das Graças"] = 6.5;
	$alunos["Paulo de Almeida"] = 7.8;
	$alunos["Rogério da Silva"] = 4.2;
	$alunos["Jerusa Fontes"] = 8.5;
	$alunos["Alícia Marques"] = 9.0;
	$alunos["Zenon Mendes"] = 4.1;
	
	/*o vetor a seguir armazena apenas as notas dos alunos, usando índice numérico 0, 1, 2, etc. 
	$alunos = array(6.5, 7.8, 4.2, 8.5, 9.0, 4.1);
	
	Outra forma, misturando índices numéricos não sequenciais:
	$alunos[0] = 6.5;
	$alunos[5] = 7.8;
	$alunos[7] = 9.8;
	$alunos[] = 9.8;
	$alunos[] = 9.8;
	*/
?>

<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Exercício 1 </title> 
		<link rel="stylesheet" href="formata-matrizes.css">
</head> 

<body> 
	<h1> Vetores com PHP - exercício 1 </h1>
	
	<form action="listaL2-exerc1.php" method="post">
		<fieldset>
			<legend> Alunos - nomes e notas de PRWII </legend>
			
			<label class="alinha"> Selecione um aluno para visualizar sua nota: </label>
			
			<select class="maior" name="aluno">
				<?php
					foreach($alunos as $nome => $nota)
						echo "<option> $nome </option>";				
				?>			
			</select> <br> <br>
			
			<!--
			<label class="alinha"> Selecione um aluno para visualizar sua nota: </label> <br>
			
			<?php
				foreach($alunos as $nome => $nota)
					echo "<input type='radio' name='aluno' value='$nome'> $nome <br>";
			
			?> -->
			
			<label class="alinha"> Forneça o nome de um aluno para visualizar sua nota: </label>
			<input type="text" name="nome-aluno" autofocus class="maior"> <br> <br>
			
			<label> Selecione uma operação: </label> <br>
			
			<input type="radio" name="operacao" value="1"> Mostrar a nota do aluno escolhido no select <br>
			
			<input type="radio" name="operacao" value="2"> Receber o nome de um aluno e mostrar sua nota			
		</fieldset>
		
		<fieldset>
			<legend> Outras operações sobre o vetor de alunos </legend>
			
			<input type="radio" name="operacao" value="3"> Ordenar os alunos decrescentemente pelo nome <br>
			
			<input type="radio" name="operacao" value="4"> Ordenar os alunos crescentemente pela nome <br>
			
			<input type="radio" name="operacao" value="5"> Mostrar a média das notas <br>
			
			<input type="radio" name="operacao" value="6"> Mostrar número de alunos com nota ACIMA da média <br>
			
			<input type="radio" name="operacao" value="7"> Mostrar a nota e o nome do aluno com a menor nota <br>
			
			<input type="radio" name="operacao" value="8"> Converter o vetor em string <br>
			
			<input type="radio" name="operacao" value="9"> Adicionar, manualmente, dados ao vetor	
		</fieldset>
		
		<button type="submit" name="enviar"> Executar operação selecionada </button>		
	</form>    
</body> 
</html> 
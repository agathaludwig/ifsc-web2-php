<?php
	//criação da matriz
	$alunos = array("1010-X1" => array("Joana de Almeida", 6.0, 5.5),
					"1010-X2" => array("João de Ataíde", 7.5, 7.8),
					"1010-X3" => array("Maria das Graças", 8.3, 9.6),
					"1010-X4" => array("Caroline Prado", 4.2, 6.1));
																	
	//mesmo vetor, de outra forma
		$alunos = ["1010-X1" => ["Joana de Almeida", 6.0, 5.5],
					"1010-X2" => ["João de Ataíde", 7.5, 7.8],
					"1010-X3" => ["Maria das Graças", 8.3, 9.6],
					"1010-X4" => ["Caroline Prado", 4.2, 6.1]];
																
	//mesmo vetor, de outra forma
	// colchetes vazio faz o índice numérico
	$alunos["1010-X1"] = ["Joana de Almeida", 6.0, 5.5];
	$alunos["1010-X2"] = ["João de Ataíde", 7.5, 7.8];
	$alunos["1010-X3"] = ["Maria das Graças", 8.3, 9.6];
	$alunos["1010-X4"] = ["Caroline Prado", 4.2, 6.1];
	
	//mesmo vetor, de outra forma
	$alunos["1010-X1"] [0] = ["Joana de Almeida"];
	$alunos["1010-X1"] [1] = [6.0];
	$alunos["1010-X1"] [2] = [5.5];
	$alunos["1010-X2"] = ["João de Ataíde"];
	$alunos["1010-X2"] = [7.5];
	$alunos["1010-X2"] = [7.8];
	$alunos["1010-X3"] = ["Maria das Graças"];
	$alunos["1010-X3"] = [8.3];
	$alunos["1010-X3"] = [9.6];
	$alunos["1010-X4"] = ["Caroline Prado"];
	$alunos["1010-X4"] = [4.2];
	$alunos["1010-X4"] = [6.1];
?>

<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Exercício 5 </title> 
		<link rel="stylesheet" href="formata-matrizes.css">
</head> 

<body> 
	<h1> Matrizes com PHP - exercício 5 </h1>
	
	<form action="listaL2-exerc5.php" method="post">
		<fieldset>
			<legend> Processamento de dados com Matrizes em PHP </legend>
			
			<label class="alinha"> Selecione um número de matrícula: </label>
			
			<select class="maior" name="matricula">
				<?php
					foreach($alunos as $matricula => $vetorInterno)
						// afinal, vamos percorrer o vetor alunos, sendo que o índice eh a matrícula e o conteúdo (=>) será o vetor interno;
						echo "<option> $matricula </option>";				
				?>			
			</select> <br> <br>
			
		
			<label class="centro"> Escolha uma operação: </label> <br>
			<button type="submit" name="infoInd"> Mostrar dados de aluno </button>
			<button type="submit" name="infoAprov"> Mostrar aprovados </button>		
			<button type="submit" name="infoMaior"> Mostrar aluno destaque </button>
			<br>	
		</fieldset>
	</form>    
</body> 
</html> 
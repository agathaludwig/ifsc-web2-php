<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Exercício 3 </title> 
		<link rel="stylesheet" href="formata-matrizes.css">
</head> 

<body> 
	<h1> Vetores com PHP <br> Exercício 3 </h1>
	
		<?php
			// receber dados dos 3 funcionários
			$mat1 = $_POST["matf1"];
			$mat2 = $_POST["matf2"];
			$mat3 = $_POST["matf3"];
			$sal1 = $_POST["salf1"];
			$sal2 = $_POST["salf2"];
			$sal3 = $_POST["salf3"];

			// criar vetor com dados do formulário armazenados em formulários

			$funcionarios = array ($mat1 => $sal1,
									$mat2 => $sal2,
									$mat3 => $sal3);
			$vetorAuxiliar = []; // ou array();
		foreach ($funcionarios as $matricula => $salario) {
			if ($salario < 998) {
				$vetorAuxiliar[$matricula] = $salario;
			}
		}	
			
			if (empty($vetorAuxiliar)) { //ou is_null
				echo "<p>Nenhum funcionário recebe menos que R$ 998,00.</p>";
			}
			else {
				echo "
				<table>
					<caption> Relação de funcionários com salário abaixo de R$ 998,00 </caption>
					<tr>
						<th> Matrícula </th>
						<th> Salário </th>
					</tr>";
					
				foreach ($vetorAuxiliar as $matricula => $salario)
				echo "<tr>
							<td> $matricula </td>
							<td> $salario </td>
						</tr>";
				echo "</table>";
			}			
	//echo "<pre>";
	//print_r($funcionarios);
	//echo "</pre>";
		?>

</body> 
</html> 
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
	$alunos["1010-X1"] [0] = "Joana de Almeida";
	$alunos["1010-X1"] [1] = 6.0;
	$alunos["1010-X1"] [2] = 5.5;
	$alunos["1010-X2"] [0]= "João de Ataíde";
	$alunos["1010-X2"] [1]= 7.5;
	$alunos["1010-X2"] [2]= 7.8;
	$alunos["1010-X3"] [0]= "Maria das Graças";
	$alunos["1010-X3"] [1]= 8.3;
	$alunos["1010-X3"] [2]= 9.6;
	$alunos["1010-X4"] [0]= "Caroline Prado";
	$alunos["1010-X4"] [1]= 4.2;
	$alunos["1010-X4"] [2]= 6.1;
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
	
	<?php
	if(isset($_POST["infoInd"])) {
		//recebe matricula do formulário (select)
		$matricula = $_POST["matricula"];
		// fazer o php localizar a o restante dos dados do aluno na matriz
		$nome = $alunos[$matricula][0];
		$mediaProva = $alunos[$matricula][1];
		$mediaExerc = $alunos[$matricula][2];
		// calculo media final
		$mediaFinal = ($mediaProva * 7 + $mediaExerc * 3)/10;

		echo "<p><strong> Dados do aluno selecionado: </strong><br>
				Matrícula: $matricula; <br>
				Média das provas: $mediaProva <br>
				Média dos exercícios: $mediaExerc; <br>
				Média final: $mediaFinal.
			 </p> ";
	}
	if(isset($_POST["infoAprov"])) {
		// matriz temporária para armazenar nome e nota final dos aprovados
		$matrizTemporaria = array(); // ou =[];
		// percorrer a matriz e calcular a média final
		foreach($alunos as $matric => $vetorInterno) {
			$nome = $alunos[$matric][0];
			$mediaProva = $alunos[$matric][1];
			$mediaExerc = $alunos[$matric][2];
			$mediaFinal = ($mediaProva * 7 + $mediaExerc * 3)/10;

			// teste se o aluno foi aprova
			if ($mediaFinal >= 6) {
				// caso aprovado, insere na matriz temporária
				$matrizTemporaria[$matric] = [$nome, $mediaFinal] ;
			}
		}
		// testas se houve aprovados (se matriz permanece vazia)
		if (empty($matrizTemporaria)) {
			echo "<p> Todos os alunos foram reprovados.</p>";
		}
		else {
		// apresentação dos dados dos aprovados
			echo "<table> 
					<caption> Dados dos alunos aprovados </caption>
					<tr>
						<th> Matrícula </th>
						<th> Aluno </th>
						<th> Média final </th>
					</tr>";	
			foreach ($matrizTemporaria as $matric => $vetorInterno) {
				echo "<tr>
						<td> $matric </td>
						<td> $vetorInterno[0] </td>
						<td> $vetorInterno[1] </td>
					</tr>";
			}
			echo "</table>"; 
		}
	}
	if(isset($_POST["infoMaior"])) {
		$vetorAuxiliar =[];
		// percorrer a matriz e calcular a média final
		foreach($alunos as $matric => $vetorInterno) {
			$mediaFinal = ($vetorInterno[1] * 7 + $vetorInterno[2] * 3)/10;

			// guardar matricula e a média geral de cada aluno
			$vetorAuxiliar[$matric] = $mediaFinal;
		}

		$maiorNota = max($vetorAuxiliar);
		$matrDestaque = array_search($maiorNota, $vetorAuxiliar);
		// acessando o nome do aluno com maior nota no array principal
		$nomeDestaque = $alunos[$matrDestaque][0];

		echo " <p><strong> Dados do aluno destaque: </strong><br>
				Matrícula: $matrDestaque; <br>
				Nome: $nomeDestaque; <br>
				Média final: $maiorNota.
			 </p> ";
	}

	?>
</body> 
</html> 
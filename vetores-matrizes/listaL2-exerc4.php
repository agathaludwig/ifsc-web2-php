<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Exercício 4 </title> 
		<link rel="stylesheet" href="formata-matrizes.css">
</head> 

<body> 
	<h1> Vetores com PHP <br> Exercício 4 </h1>
	
		<?php
			// receber dados dos usuários
			$nome1 = $_POST["nome1"];
			$idade1 = $_POST["idade1"];
			$nome2 = $_POST["nome2"];
			$idade2 = $_POST["idade2"];

			// criar vetor com dados do formulário

			$usuarios = array($nome1 => $idade1,
								$nome2 => $idade2);
			$vetorAuxiliar = []; // ou array();
			echo "
				<table>
					<caption> Vetor de usuários </caption>
					<tr>
						<th> Nome </th>
						<th> Idade </th>
					</tr>";
					
			foreach ($usuarios as $nome => $idade) {
				echo "<tr>
							<td> $nome </td>
							<td> $idade </td>
						</tr>";
			}
			echo "</table>";

			foreach ($usuarios as $nome => $idade) {
				if ($idade < 18) {
					$vetorAuxiliar[$nome] = $idade;
				}
			}	
			
			if (empty($vetorAuxiliar)) { //ou is_null
				echo "<p>Nenhum usuário é menor de 18 anos.</p>";
			}
			else {
				echo "
				<table>
					<caption> Vetor de usuários menores de 18 anos </caption>
					<tr>
						<th> Nome </th>
						<th> Idade </th>
					</tr>";
				foreach ($vetorAuxiliar as $nome => $idade) {
				echo "<tr>
							<td> $nome </td>
							<td> $idade </td>
						</tr>";
			}
			echo "</table>";
			}			
			$maiorIdade = max($usuarios);
			$nomeMaiorIdade = array_search($maiorIdade, $usuarios);
			echo "<p> O usuário mais velho é $nomeMaiorIdade com $maiorIdade anos. ";
	//echo "<pre>";
	//print_r($funcionarios);
	//echo "</pre>";
		?>

</body> 
</html> 
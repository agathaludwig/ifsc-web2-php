<?php
	//criação o vetor a partir dos dados da tabela
	$alunos = array("Maria das Graças" => 6.5,
					"Paulo de Almeida" => 7.8,
					"Rogério da Silva" => 4.2,
					"Jerusa Fontes" => 8.5,
					'Alícia Marques' => 9.0,
					'Zenon Mendes' => 4.1);
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
	
	<?php
		// receber do navegador o value do radio button -> operação 1
	$operacao = $_POST["operacao"];
	
	// exercicio 1 item a
	if ($operacao == "1") {
		// receber o nome do aluno escolhido pelo SELECT
		$nome = $_POST["aluno"];
		// receber o valor correspondente do vetor
		$nota = $alunos[$nome];
		echo "<p>A nota do alunx <strong>$nome</strong> é <strong>$nota</strong>.</p>";
	}
	// exercício 1 item d: Receber o nome de um aluno e mostrar sua nota
	if ($operacao == "2") {
		// receber o nome do aluno escolhido pelo SELECT
		$nome = $_POST["nome-aluno"];
		// deve pesquisar se este numero existe (como indice) no vetor
		$existe = array_key_exists($nome, $alunos);
		
		if ($existe == true) {
			$nota = $alunos[$nome];
			echo "<p>A nota do alunx <strong>$nome</strong> é <strong>$nota</strong>.</p>";
		}
		else 
			echo "<p>Este não é um alunx cadastrado.</p>";
		
	}
	// exercício 1 item b: Ordenar os alunos decrescentemente pelo nome
		if ($operacao == "3") {
		krsort($alunos); //ordenar pelo índice e em ordem decrescente (K e R)
	//montar cabeçalho da tabela
		echo "<table>
				<caption> Dados do aluno ordenados decrescentemente pelo nome </caption>
				<tr>
					<th> Aluno </th>
					<th> Nota </th>
				</tr>";
	// montar o restante da tabela com laço
	foreach ($alunos as $nome => $nota){
		echo "<tr>
				<td>$nome</td>
				<td>$nota</td>
			</tr>";
	}
		echo "</table>";
	}
// exercício 1 item c: Ordenar os alunos crescentemente pela nome
		if ($operacao == "4") {
		asort($alunos);
	//montar cabeçalho da tabela
		echo "<table>
				<caption> Dados do aluno ordenados crescentemente pela nota </caption>
				<tr>
					<th> Aluno </th>
					<th> Nota </th>
				</tr>";
	// montar o restante da tabela com laço
	foreach ($alunos as $nome => $nota){
		echo "<tr>
									<td>$nome</td>
									<td>$nota</td>
								</tr>";
	}
		echo "</table>";
	}
	// exercício 1 item e: Mostrar a média das notas
if ($operacao == "5") {
		$soma = array_sum($alunos);
		$tamanho = count($alunos);
		$media = $soma/$tamanho;	
		/* ou tudo junto: array_sum($alunos)/count($alunos) */
		$mediaFormat = number_format($media, 2, ",", ".");
		
	echo "<p>A média das notas dos alunos é <strong>$mediaFormat</strong>.</p> ";
	}
	//mostrar na pagina o array, para conferencia
	//echo "<pre>";
	//print_r($alunos);
	//echo "</pre>";

	// exercício 1 item f: Mostrar número de alunos com nota ACIMA da média
if ($operacao == "6") {
	$media = array_sum($alunos)/count($alunos);
	$mediaFormat = number_format($media, 2, ",", ".");
	$contador = 0;
	foreach ($alunos as $nome => $nota) {
		if ($nota > $media) {
			$contador++;
		}
	}
	echo "<p>Número de alunos acima da média $mediaFormat: <strong>$contador</strong> alunos.</p>";
}
// exercício 1 item g: Mostrar a nota e o nome do aluno com a menor nota
if ($operacao == "7") {
	$menorNota = min($alunos);
	$alunoMenorNota = array_search($menorNota, $alunos);
	echo "<p>O aluno com menor nota é <strong>$alunoMenorNota</strong> com a nota <strong>$menorNota</strong>.</p>";
}
// exercício 1 item h: Converter vetor em string - uso: checkbox
if ($operacao == "8") {
	$vetorString = implode(", ", $alunos);
	echo "<p>Vetor alunos convertido em string: <strong>$vetorString</strong>.</p>";
	// oposto: string em vetor: explode
	$stringVetor = explode(", ", $vetorString);
	echo "<p>String alunos convertido em vetor:</p>";
	echo "<pre>";
	print_r($alunos);
	echo "</pre>";

}
// exercício 1 item i: Adicionar manualmente alguns alunos ao vetor e suas respectivas notas, mostarar o vetor final em forma tabular
if ($operacao == "9") {
	$alunos["José Saramago"] = 8.8;
	$alunos["Clarice Linspector"] = 7.9;

//cabeçalho da tabela
	echo "<table>
			<caption> Notas dos alunos </caption>
			<tr>
				<th> Aluno </th>
				<th> Nota </th>
			</tr>";
// tabela
	foreach ($alunos as $nome => $nota) {
		echo "<tr>
				<td>$nome</td>
				<td>$nota</td>
			</tr>";
	}
	echo "</table>";
}

	?>
	</body> 
</html>
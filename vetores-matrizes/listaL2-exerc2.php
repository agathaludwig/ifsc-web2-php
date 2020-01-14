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
	<h1> Vetores com PHP - exercício 2 </h1>
	
	<?php
		// receber do navegador o value da operacao
	$operacao = $_POST["operacoes"];
	
// exercicio 2 item a: Mostrar população da capital selecionada
	if ($operacao == "1") {
		$nome = $_POST["capitais"];
		$pop = $capitais[$nome];
		$popFormat = number_format($pop, 0, ",", ".");
		echo "<p>A população da capital <strong>$nome</strong> é <strong>$popFormat</strong> habitantes.</p>";
	}
	
// exercício 2 item d: Verificar população da capital inserida
	if ($operacao == "2") {
		$nome = $_POST["capital"];
		// pesquisar se este numero existe (como indice) no vetor
		$existe = array_key_exists($nome, $capitais);
		
		if ($existe == true) {
			$pop = $capitais[$nome];
			$popFormat = number_format($pop, 0, ",", ".");
		echo "<p>A população da capital <strong>$nome</strong> é <strong>$popFormat</strong> habitantes.</p>";
		}
		else 
			echo "<p>Esta não é uma capital válida.</p>";
		
	}
	
// exercício 2 item b: Mostrar tabela em ordem crescente por capital
	if ($operacao == "3") {
		ksort($capitais); //ordenar pelo índice e em ordem crescente
	//montar cabeçalho da tabela
		echo "<table>
				<caption> Populações das capitais ordenadas crescentemente pelo nome </caption>
				<tr>
					<th> Capital </th>
					<th> População </th>
				</tr>";
	// montar o restante da tabela com laço
		foreach ($capitais as $nome => $pop){
			$popFormat = number_format($pop, 0, ",", ".");
			echo "<tr>
					<td>$nome</td>
					<td>$popFormat</td>
				</tr>";
		}
			echo "</table>";
	}

// exercício 2 item c: Mostrar relação ordem decrescente por população
	if ($operacao == "4") {
		arsort($capitais);
	//montar cabeçalho da tabela
		echo "<table>
				<caption> Populações das capitais ordenadas decrescentemente pela população  </caption>
				<tr>
					<th> Capital </th>
					<th> População </th>
				</tr>";
	// montar o restante da tabela com laço
		foreach ($capitais as $nome => $pop){
		$popFormat = number_format($pop, 0, ",", ".");
		echo "<tr>
				<td>$nome</td>
				<td>$popFormat</td>
			</tr>";
		}
		echo "</table>";
	}
	
// exercício 2 item e: Mostrar média populacional
	if ($operacao == "5") {
		$media = array_sum($capitais)/count($capitais);
		$mediaFormat = number_format($media, 2, ",", ".");
		
	echo "<p>A média populacional destas capitais é <strong>$mediaFormat</strong>.</p> ";
	}
	
// exercício 2 item f: Mostrar quantas capitais estão abaixo da média populacional
	if ($operacao == "6") {
		$media = array_sum($capitais)/count($capitais);
		$mediaFormat = number_format($media, 2, ",", ".");
		$contador = 0;
		foreach ($capitais as $nome => $pop) {
			if ($pop < $media) {
				$contador++;
			}
		}
		echo "<p>Número de capitais abaixo da média de <strong>$mediaFormat</strong> habitantes é <strong>$contador</strong>.</p>";
	}

// exercício 2 item g: Mostrar a capital de maior população
	if ($operacao == "7") {
		$maiorPop = max($capitais);
		$capMaiorPop = array_search($maiorPop, $capitais);
		$popFormat = number_format($maiorPop, 0, ",", ".");
		echo "<p>A capital com maior população é <strong>$capMaiorPop</strong> com a população de <strong>$popFormat</strong>.</p>";
	}

// exercício 2 item h: Converter vetor em string e escrever o conteúdo
	if ($operacao == "8") {
		$vetorString = implode(", ", $capitais);
		echo "<p>Vetor capitais convertido em string: <strong>$vetorString</strong>.</p>";
		
	}

// exercício 2 item i: Acrescentar manualmente mais capitais e mostrar em tabela
	if ($operacao == "9") {
		$capitais["Curitiba"] = 1765000;
		$capitais["Vitória"] = 211529;

	//cabeçalho da tabela
		echo "<table>
				<caption> Populações das capitais </caption>
				<tr>
					<th> Capital </th>
					<th> População </th>
				</tr>";
	// tabela
		foreach ($capitais as $nome => $pop) {
			$popFormat = number_format($pop, 0, ",", ".");
			echo "<tr>
					<td>$nome</td>
					<td>$popFormat</td>
				</tr>";
		}
		echo "</table>";
	}
	?>
	</body> 
</html>
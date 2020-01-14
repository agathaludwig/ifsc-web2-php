<?php
	//criação da matriz
	$contas = array("1010-X1" => array("Joana de Almeida", 6800.00),
					"1010-X2" => array("Genésio de Ataíde",15300.00),
					"1010-X3" => array("Maria das Graças", 4100.12),
					"1010-X4" => array("Caroline Prado", 2300.76));
?>

<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Exercício 6 </title> 
		<link rel="stylesheet" href="formata-matrizes.css">
</head> 

<body> 
	<h1> Matrizes com PHP </h1>
	<?php 
		$operacao = $_POST['operacoes'];
		
		if ($operacao == "1") {
			$numConta = $_POST["numConta"];
			$valor = $_POST["valor"];
			$transacao = $_POST['transacao'];
			if ($transacao == "1") { // atualizar saldo
				$saldo = $contas[$numConta][1];
				$novoSaldo = $saldo + $valor;
				$contas[$numConta][1] = $novoSaldo;
				echo "<p>Você realizou um DEPÓSITO. <br>
				Conta: $numConta<br>
				Nome: {$contas[$numConta][0]}<br>
				Valor: $valor<br>
				Saldo inicial: $saldo<br>
				Saldo atualizado: $novoSaldo</p>";
			}
			else {
				$saldo = $contas[$numConta][1];
				$novoSaldo = $saldo - $valor;
				$contas[$numConta][1] = $novoSaldo;
				echo "<p>Você realizou um SAQUE. <br>
				Conta: $numConta<br>
				Nome: {$contas[$numConta][0]}<br>
				Valor: $valor<br>
				Saldo inicial: $saldo<br>
				Saldo atualizado: $novoSaldo</p> ";
			}
		}
		if ($operacao == "2") { // maior saldo
			$vetorAuxiliar = []; // ou array();
			foreach ($contas as $numConta => $vetorInterno) {
				$vetorAuxiliar[$numConta] = $vetorInterno[1];
			}
			$maiorSaldo = max($vetorAuxiliar);
			$contaMaiorSaldo = array_search($maiorSaldo, $vetorAuxiliar);
			$nomeMaiorSaldo = $contas[$contaMaiorSaldo][0];
			echo "<p>O correntista com maior saldo é: <br>
				Conta: $contaMaiorSaldo<br>
				Nome: $nomeMaiorSaldo<br>
				Saldo: $maiorSaldo</p> ";
		}
		if ($operacao == "3") { // maior saldo
			$contas["1010-X5"] = array("Maria da Silva", 2800.00);
			$contas["1010-X6"] = array("Silvia de OLiveira", 2300.00);
				echo "
				<table>
					<caption> Matriz de contas </caption>
					<tr>
						<th> Conta </th>
						<th> Nome </th>
						<th> Saldo </th>
					</tr>";
					
				foreach ($contas as $numConta => $vetorInterno) {
				echo "<tr>
							<td> $numConta </td>
							<td> {$vetorInterno[0]} </td>
							<td> {$vetorInterno[1]} </td>
						</tr>";
				}
			echo "</table>";
		}			

	?>
</body> 
</html> 
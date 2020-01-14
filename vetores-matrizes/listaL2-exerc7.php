<!DOCTYPE html> 
<html lang="pt-BR"> 
	<head> 
		<meta charset="utf-8"> 
		<title> Exercício 7 </title> 
		<link rel="stylesheet" href="formata-matrizes.css">
	</head> 

	<body> 
		<h1> Matrizes com PHP - exercício 7 </h1>
		<?php
		/* ------------------------------------------------
			CASO FOSSE MAIS DE UM BOTÃO, FOI SUBSTITUÍDO:
			if(isset($_POST["enviar"])) {
				echo "<p> pressionou cadastro </p>";
			}
			if(isset($_POST["pesquisar"])) {
				echo "<p> pressionou pesquisar </p>";
			}
			if(isset($_POST["maior"])) {
				echo "<p> pressionou maior </p>";
			}
			if(isset($_POST["mostrar"])) {
				echo "<p> pressionou mostrar </p>";
			} 
			---------------------------------------------- */

		/* CADASTRO DE DADOS NA MATRIZ a partir de variáveis simples:
			$cod1 = $_POST["cod1"];	
			$cod2 = $_POST["cod2"];
			$cod3 = $_POST["cod3"];

			$qtd1 = $_POST["qtd1"];
			$qtd2 = $_POST["qtd2"];
			$qtd3 = $_POST["qtd3"];

			$preco1 = $_POST["preco1"];
			$preco2 = $_POST["preco2"];
			$preco3 = $_POST["preco3"];

			$produtos[$cod1] = [$qtd1, $preco1];
			$produtos[$cod2] = [$qtd2, $preco2];
			$produtos[$cod3] = [$qtd3, $preco3];

			-------------- OUTRA FORMA SIMPLIFICADA ------ */
			for ($i=1; $i <= 3; $i++) {
				$cod = "cod".$i; // operador de concatenação é o PONTO;
				$qtd = "qtd".$i;
				$preco = "preco".$i;

				$cod = $_POST[$cod]; // substituição do nome pelo valor
				$qtd = $_POST[$qtd];
				$preco = $_POST[$preco];

				$produtos[$cod] = [$qtd, $preco];
			}
		/* ---------------------------------------------- 
			echo "<pre>";
			print_r($produtos);
			echo "</pre>";*/

			echo "<table>
					<caption> Dados da matriz dos produtos </caption>
					<th> Código </th>
					<th> Quantidade </th>
					<th> Preço Un </th>";
			foreach($produtos as $codigo => $vetorInterno) {
				echo "<tr>
						<td> $codigo </td>
						<td> $vetorInterno[0] </td>
						<td> $vetorInterno[1] </td>
					</tr>";
			}
			echo "</table>";

		// item b: mostrar produto de maior quantodade em estoque
			// criar um vetor temporario com as quantidades em estoque par autilizar a função max
			foreach ($produtos as $codigo => $vetorInterno) {
				$vetorTemporario[$codigo] = $vetorInterno[0];	
			}
			$maiorQtd = max($vetorTemporario);
			$codigoMaior = array_search($maiorQtd, $vetorTemporario);
			$precoMaior = $produtos[$codigoMaior][1];

			echo "<p><strong> Produto com maior quantidade em estoque: </strong><br>
			Código: $codigoMaior <br>
			Quantidade: $maiorQtd <br>
			Preço: R$ $precoMaior <br> </p>";

		// item c: calcular e mostrar o faturamento total	
			$total = 0;
			foreach ($produtos as $codigo => $vetorInterno) {
				$subtotal = $vetorInterno[0] * $vetorInterno[1];
				$total += $subtotal;
			}
			echo "<p><strong> Faturamento total: </strong><br>
			R$ $total </p>";

		// item d: buscar produto e mostrar as informações, se não encontrar mostrar mensagem 
			$pesquisarCod = $_POST["pesquisaCod"];

			if (array_key_exists($pesquisarCod, $produtos)) { 
			// teste condensado: == true
				echo "<p><strong> Resultado da busca: </strong><br>
				Código: $pesquisarCod <br>
				Quantidade: {$produtos[$pesquisarCod][0]} <br>
				Preço: R$ {$produtos[$pesquisarCod][1]} </p>";
				// para acessar os valores da matriz precisa "isolar" as aspas com a chave, serve tb para indices associativos com string
			}
			else {
				echo "<p> Código não encontrado </p>";
			}			

		?>
		
	</body> 
</html> 
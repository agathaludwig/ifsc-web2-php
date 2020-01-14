<?php
	//criação da matriz
	$produtos = array("Arroz" => array(1, 25.00),
					"Água Sanitária" => array(2, 8.30),
					"Feijão" => array(1, 10.00),
					"Detergente" => array(2, 6.00));
?>

<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Avaliação 1 </title> 
		<link rel="stylesheet" href="formata-matrizes-av.css">
</head> 

<body> 
	<h1> Matrizes em PHP - avaliação </h1>
	<form action="avaliacao1.php" method="post">
		<fieldset>
			<legend> Totalização </legend>
			<label class="alinha"> Forneça a classificação do produto para a totalização: </label>
			<input class="medio" type="number" name="classificacao" min="1" max="2"> 
		</fieldset>
		<button type="submit" name="totalizar"> Totalizar preços</button>
	</form>

	<?php
		if(isset($_POST["totalizar"])) {
		// A
			$somatoria = 0;
			$classificacao = $_POST["classificacao"];
			foreach($produtos as $produto => $vetorInterno) {
				$somatoria += $vetorInterno[1];
			}
			$media = $somatoria/count($produtos);
			$mediaFormat = number_format($media, 2, ",", ".");
			echo "<p> A <em>média de preços</em> dos produtos cadastrados é de <strong>R$$mediaFormat</strong>.</p>";
		// B
			foreach ($produtos as $produto => $vetorInterno) {
				if ($vetorInterno[0] == $classificacao){
					$vetorTemporario[$produto] = $vetorInterno[1];	
				}
			}
		 /* echo "<pre>";
			print_r($vetorTemporario);
			echo "</pre>";*/
			$menorPreco = min($vetorTemporario);
			$menorProduto = array_search($menorPreco, $vetorTemporario);
			$menorPrecoFormat = number_format($menorPreco, 2, ",", ".");
			echo "<p> O produto de <em>menor preço</em> cadastrado na categoria <strong>$classificacao</strong> é o <strong>$menorProduto</strong> com o valor de <strong>R$$menorPrecoFormat</strong>.</p>";
		}
	?>
</body> 

</html> 
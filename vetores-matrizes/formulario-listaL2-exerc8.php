<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Exercício 8 </title> 
		<link rel="stylesheet" href="formata-matrizes.css">
</head> 

<body> 
	<h1> Matrizes com PHP - Exercício 8</h1>
	
	<form action="#" method="post">
		<fieldset>
			<legend> Cadastro de cliente 1 </legend>
			
			<label class="alinha"> CPF: </label>
			<input type="text" name="cpf1" autofocus> <br>	

			<label class="alinha"> Nome: </label>
			<input type="text" name="nome1"> <br>	
			
			<label class="alinha"> Forneça um valor em reais: </label>
			<input type="number" name="valor1" step="0.01" min="0"> <br> 	

			<input type="radio" name="pagamento1" value="1" class="alinha" /> 
			<label class="alinha1">Cartão/Dinheiro  <br>
			<input type="radio" name="pagamento1" value="2" class="alinha"/> 
			<label class="alinha1"> Outra <br>
		</fieldset>

		<fieldset>
			<legend> Cadastro de cliente 2 </legend>
			
			<label class="alinha"> CPF: </label>
			<input type="text" name="cpf2" > <br>	

			<label class="alinha"> Nome: </label>
			<input type="text" name="nome2"> <br>	
			
			<label class="alinha"> Forneça um valor em reais: </label>
			<input type="number" name="valor2" step="0.01" min="0"> <br> 	

			<input type="radio" name="pagamento2" value="1" class="alinha" /> 
			<label class="alinha1">Cartão/Dinheiro  <br>
			<input type="radio" name="pagamento2" value="2" class="alinha"/> 
			<label class="alinha1"> Outra <br>
		</fieldset>

		<fieldset>
			<legend> Cadastro de cliente 3 </legend>
			
			<label class="alinha"> CPF: </label>
			<input type="text" name="cpf3" > <br>	

			<label class="alinha"> Nome: </label>
			<input type="text" name="nome3"> <br>	
			
			<label class="alinha"> Forneça um valor em reais: </label>
			<input type="number" name="valor3" step="0.01" min="0"> <br> 	

			<input type="radio" name="pagamento3" value="1" class="alinha" /> 
			<label class="alinha1">Cartão/Dinheiro  <br>
			<input type="radio" name="pagamento3" value="2" class="alinha"/> 
			<label class="alinha1"> Outra <br>
		</fieldset>

		<fieldset>
			<legend> Cadastro de cliente 4 </legend>
			
			<label class="alinha"> CPF: </label>
			<input type="text" name="cpf4" > <br>	

			<label class="alinha"> Nome: </label>
			<input type="text" name="nome4"> <br>	
			
			<label class="alinha"> Forneça um valor em reais: </label>
			<input type="number" name="valor4" step="0.01" min="0"> <br> 	

			<input type="radio" name="pagamento4" value="1" class="alinha" /> 
			<label class="alinha1">Cartão/Dinheiro  <br>
			<input type="radio" name="pagamento4" value="2" class="alinha"/> 
			<label class="alinha1"> Outra <br>
		</fieldset>

		<button type="submit" name="todos"> Mostrar todos </button>
		<button type="submit" name="menor"> Mostrar menor </button>
		<button type="submit" name="dinheiro"> Mostrar cartão/dinheiro </button>
		<button type="submit" name="dotz"> Mostrar dotz </button>
	</form>    
<?php
	if(isset($_POST["todos"])) {
		for ($i=1; $i <= 4; $i++) {
			$cpf = "cpf".$i; // operador de concatenação é o PONTO;
			$nome = "nome".$i;
			$valor = "valor".$i;
			$pagamento = "pagamento".$i;

			$cpf = $_POST[$cpf]; // substituição do nome pelo valor
			$nome = $_POST[$nome];
			$valor = $_POST[$valor];
			$pagamento = $_POST[$pagamento];

			$clientes[$cpf] = [$nome, $valor, $pagamento];
		}
		// echo "<pre>";
		// print_r($clientes);
		// echo "</pre>";
		echo "
			<table>
				<caption> Matriz de clientes </caption>
				<tr>
					<th> CPF </th>
					<th> Nome </th>
					<th> Valor </th>
					<th> Tipo de pagamento </th>
				</tr>";
				
		foreach ($clientes as $cpf => $vetorInterno) {
			echo "<tr>
					<td> $cpf </td>
					<td> {$vetorInterno[0]} </td>
					<td> {$vetorInterno[1]} </td> ";
				if ($vetorInterno[2] == "1") {
				 	echo "<td> Cartão/Dinheiro </td> ";
				}
				else {
				 	echo "<td> Outros </td>";
				}
			echo "</tr>";
		}
		echo "</table>";
	}
						
	if(isset($_POST["menor"])) {
		for ($i=1; $i <= 4; $i++) {
			$nome = "nome".$i;
			$valor = "valor".$i;

			$nome = $_POST[$nome];
			$valor = $_POST[$valor];

			$vetor[$nome] = $valor; 
		}
	
		$menorCompra = min($vetor);
		$nomeMenor = array_search($menorCompra, $vetor);
		echo "<p> O cliente que efetuou a menor compra é: <br>
		<strong> $nomeMenor, no valor de R$ $menorCompra </strong>;	</p>";
	}
	if(isset($_POST["dinheiro"])) {
		for ($i=1; $i <= 4; $i++) {
			$cpf = "cpf".$i; // operador de concatenação é o PONTO;
			$nome = "nome".$i;
			$valor = "valor".$i;
			$pagamento = "pagamento".$i;

			$cpf = $_POST[$cpf]; // substituição do nome pelo valor
			$nome = $_POST[$nome];
			$valor = $_POST[$valor];
			$pagamento = $_POST[$pagamento];

			if ($pagamento == "1") {
				$clientes[$cpf] = [$nome, $valor];
			}
		}
		// echo "<pre>";
		// print_r($clientes);
		// echo "</pre>";
		if (empty($clientes)) {
			echo "<p>Nenhum pagamento efetuado em cartão/dinheiro.</p>";
		}		
		else {
			echo "
			<table>
				<caption> Clientes com pagamento em cartão/dinheiro</caption>
				<tr>
					<th> CPF </th>
					<th> Nome </th>
					<th> Valor </th>
				</tr>";
				
			foreach ($clientes as $cpf => $vetorInterno) {
				echo "<tr>
						<td> $cpf </td>
						<td> {$vetorInterno[0]} </td>
						<td> {$vetorInterno[1]} </td> 
					</tr>";
			}
			echo "</table>";
		}
	}
	if(isset($_POST["dotz"])) { 
		for ($i=1; $i <= 4; $i++) {
			$cpf = "cpf".$i; 
			$nome = "nome".$i;
			$valor = "valor".$i;
			$pagamento = "pagamento".$i;

			$cpf = $_POST[$cpf];
			$nome = $_POST[$nome];
			$valor = $_POST[$valor];
			$pagamento = $_POST[$pagamento];

			$clientes[$cpf] = [$nome, $valor, $pagamento];

			foreach ($clientes as $cpf => $vetorInterno) {
				if ($vetorInterno[2] == "1") {
					$dotz = $vetorInterno[1]/2;
				}
				else {
					$dotz = $vetorInterno[1]/4;
				}
				$clientesDotz[$cpf] = [$nome, $dotz];
			}
		}
		// echo "<pre>";
		// print_r($clientesDotz);
		// echo "</pre>";
		echo "
			<table>
				<caption> Matriz de dotz de clientes </caption>
				<tr>
					<th> CPF </th>
					<th> Nome </th>
					<th> Dotz </th>
				</tr>";
				
		foreach ($clientes as $cpf => $vetorInterno) {
			echo "<tr>
					<td> $cpf </td>
					<td> {$vetorInterno[0]} </td>
					<td> {$vetorInterno[2]} </td>
				</tr>";
		}
		echo "</table>";
	} 
?>
</body> 
</html> 
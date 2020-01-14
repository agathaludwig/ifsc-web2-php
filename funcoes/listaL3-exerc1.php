<?php
	//quando a função nao devolve nenhuma mensagem de texto, pode ser declarada em qualquer lugar
	// preferencialmente utiliza-se no inicio ou no fim
	// no entanto, se houver saída de texto, deve ser declarada dentro do body
	function testarValor($valor) {
		// para nao passar parametros, pode-se acessar a variável global:
		// global $valor -> transforma em global global mesmo
		$valorTestado = filter_var($valor, FILTER_VALIDATE_INT); // função pronta do php (valor e constante/tipo de validação)
		// https://www.php.net/manual/en/filter.filters.validate.php
		if ($valorTestado === false OR $valor <0) {
			// o == inclui como falso o nulle o 0
			// o === apenas considera false o FALSE mesmo (bool)
			return false;
		}
		else {
			return true;
		}
	}
?>
<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Exercício 1 - Funções e Includes</title> 
		<link rel="stylesheet" href="formata-includes-funcoes.css">
</head> 

<body> 
	<h1> Funções </h1>
	
	<form action="#" method="post"> <!-- action pode ser "", ou "#", ou o nome do arquivo -->
		<fieldset>
			<legend> Exercício 1 </legend>
			<label> Validação de campos numéricos - funções de usuários: </label> <br> <br>
			<label class="alinha"> Insira um número inteiro maior ou igual a zero: </label>
			<!-- vamos usar o input type text para provar a validação -->
			<input type="text" name="valor" autofocus class="maior"> <br> <br>	
			<button type="submit" name="enviar"> Calcular raiz quadrada </button>
		</fieldset>
	</form>    
	<?php
	//receber o dado do formulario fornecido pelo usuário
	if (isset($_POST["enviar"])) {
		$valor = $_POST["valor"];
		// invocar função que testa se é um valor válido
		$retorno = testarValor($valor); // ARGUMENTO : parâmetro
		// regras de nomes de funções são iguais as variáveis, não é case sensitive
		// teste de retorno para mensagem adequada
		if ($retorno) {
			$raiz = sqrt($valor);
			$raizFormata = number_format($raiz, 2, ",", ".");
			echo "<p>A raiz quadrada do valor de $valor é <strong>$raizFormata</strong>.</p>";
		}
		else {
			echo "<p> Não é um número inteiro maior ou igual a zero. <br>Tente novamente.</p>";
		}
	}
	?>

</body> 
</html> 
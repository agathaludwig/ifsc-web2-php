<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Fundamentos do PHP </title> 
</head>
	
<body> 
	<h1> Elementos fundamentais da linguagem PHP - exercício 9 da lista L1</h1>

<?php
// fazendo o PHP receber os dados do formulário e armazaná-los em três variáveis simples	

$val1 = $_POST["valor1"];
$val2 = $_POST["valor2"];
$val3 = $_POST["valor3"];

$expressao = ($val1 - $val2)* $val3;

//utilizando uma função que faz a formatação de valores numérico
$expressaoFormatada = number_format($expressao, 2, ",", ".");
//variavel, casas decimais, divisor decimal, divisor milhar

echo " <p>Resultado do processamento: <br>
Valor 1: $val1;<br>
Valor 2: $val2;<br>
Valor 3: $val3;<br> <br>
Resultado da expressão (\$val1-\$val2)*\$val3 = $expressaoFormatada;

</p>";

?>
</body> 
</html> 
<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Fundamentos do PHP </title> 
</head>
	
<body> 
	<h1> Elementos fundamentais da linguagem PHP - exercício 10 da lista L1</h1>

<?php
// fazendo o PHP receber os dados do furmulário e armazaná-los em três variáveis simples	

$x = $_POST["valorx"];
// definindo as CONSTANTES com os valores recebidos do formulário
define("Y",$_POST["valory"]);
define("Z",$_POST["valorz"]);

$expressao = (($x - 5)* Y) - Z;

//utilizando uma função que faz a formatação de valores numérico
$expressaoFormatada = number_format($expressao, 1, ",", ".");
//variavel, casas decimais, divisor decimal, divisor milhar

echo " <p>Resultado do cálculo: <br>
Valor x: $x;<br>
Valor Y: ", Y, ";<br>
Valor Z: ", Z, ";<br> <br>
Resultado da expressão ((\$x - 5)* Y) - Z = $expressaoFormatada;

</p>";

?>
</body> 
</html> 